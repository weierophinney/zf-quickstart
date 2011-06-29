<?php
namespace Zf2\Mvc;

use 
    Traversable,
    Zend\Di\DependencyInjection,
    Zend\Di\ServiceLocation,
    Zend\EventManager\EventCollection,
    Zend\EventManager\EventManager,
    Zf2\Http\Request as HttpRequest,
    Zf2\Http\Response as HttpResponse,
    Zf2\Stdlib\Dispatchable,
    Zf2\Stdlib\Request,
    Zf2\Stdlib\Response;

class FrontController implements Dispatchable
{
    protected $events;
    protected $response;
    protected $router;
    protected $services;
    protected $notFoundHandler = 'static::prepare404';

    public function __construct($services)
    {
        if (!$services instanceof ServiceLocation && !$services instanceof DependencyInjection) {
            throw new Exception\InvalidArgumentException(
                'Front controller expects a service locator or dependency injector'
            );
        }

        $this->services = $services;
    }

    public function events(EventCollection $events = null)
    {
        if (null !== $events) {
            $this->events = $events;
        } elseif (null === $this->events) {
            $this->events = new EventManager(array(__CLASS__, get_called_class()));
        }
        return $this->events;
    }

    public function router(RouteStack $router = null)
    {
        if (null !== $router) {
            $this->router = $router;
        } elseif (null === $this->router) {
            if (!($router = $this->services->get('router'))) {
                $router = new Router();
            }
            $this->router = $router;
        }
        return $this->router;
    }

    public function response(Response $response = null)
    {
        if (null !== $response) {
            $this->response = $response;
        } elseif (null === $this->response) {
            $this->response = new HttpResponse();
        }
        return $this->response;
    }

    public function setNotFoundHandler($callback)
    {
        if (!is_callable($callback)) {
            throw new Exception\InvalidArgumentException('Invalid callback provided for 404 handler');
        }
        $this->notFoundHandler = $callback;
        return $this;
    }

    public function dispatch(Request $request, Response $response = null)
    {
        if (null !== $response) {
            $this->response($response);
        }
        $response = $this->response();

        $responseComplete = function($result) {
            return ($result instanceof Response);
        };
        $params = compact('request', 'response');

        $result = $this->events()->triggerUntil(
            __FUNCTION__ . '.router.pre', $this, $params, $responseComplete
        );
        if ($result->stopped()) {
            return $result->last();
        }

        if (!$result = $this->router()->match($request)) {
            call_user_func($this->notFoundHandler, $request, $response);
            return $response;
        }
        $request->setMetadata($result);

        $result = $this->events()->triggerUntil(
            __FUNCTION__ . '.router.post', $this, $params, $responseComplete
        );
        if ($result->stopped()) {
            return $result->last();
        }

        if (!$controller = $request->getMetadata('controller', false)) {
            call_user_func($this->notFoundHandler, $request, $response);
            return $response;
        }

        if (!($dispatchable = $this->loadController($controller))) {
            call_user_func($this->notFoundHandler, $request, $response);
            return $response;
        }

        if (!$dispatchable instanceof Dispatchable) {
            throw new Exception\DomainException(sprintf(
                'Invalid controller "%s" mapped; does not implement Dispatchable',
                $controllerClass
            ));
        }

        $result = $this->events()->triggerUntil(
            __FUNCTION__ . '.pre', $this, $params, $responseComplete
        );
        if ($result->stopped()) {
            return $result->last();
        }

        $result = $dispatchable->dispatch($request, $response);

        if ($result instanceof Response) {
            return $result;
        }

        $params['__RESULT__'] = $result;
        $result = $this->events()->triggerUntil(
            __FUNCTION__ . '.post', $this, $params, $responseComplete
        );
        if ($result->stopped()) {
            return $result->last();
        }

        return $response;
    }

    public static function prepare404(Request $request, Response $response)
    {
        $response->getHeaders()->setStatusCode(404);
        $response->setContent('<h1>Not Found</h1>');
    }

    protected function loadController($name)
    {
        // If not a DI container, just return the return value
        if (!$this->services instanceof DependencyInjection) {
            return $this->services->get($name);
        }

        // Check if we have a class or alias by this name
        $definition = $this->services->getDefinition();
        if (!$definition->hasClass($name)) {
            $manager = $this->services->getInstanceManager();
            if (!$manager->hasAlias($name)) {
                // No class or alias found; return false
                return false;
            }
        }

        // Found; retrieve and return it
        return $this->services->get($name);
    }
}
