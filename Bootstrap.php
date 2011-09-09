<?php

use Zend\Config\Config,
    Zend\Di\Configuration,
    Zend\Di\Definition,
    Zend\Di\Definition\Builder,
    Zend\Di\DependencyInjector,
    Zend\EventManager\StaticEventManager,
    Zend\Stdlib\ResponseDescription as Response,
    Zend\View\Variables as ViewVariables,
    Zf2Mvc\Application;

class Bootstrap
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function bootstrap(Application $app)
    {
        $this->setupLocator($app);
        $this->setupRoutes($app);
        $this->setupEvents($app);
    }

    protected function setupLocator(Application $app)
    {
        /**
         * Instantiate and configure a DependencyInjector instance, or 
         * a ServiceLocator, and return it.
         */
        $definition = new Definition\AggregateDefinition;
        $definition->addDefinition(new Definition\RuntimeDefinition);

        $di = new DependencyInjector();
        $di->setDefinition($definition);

        $config = new Configuration($this->config->di);
        $config->configure($di);

        $app->setLocator($di);
    }

    protected function setupRoutes(Application $app)
    {
        /**
         * Pull the routing table from configuration, and pass it to the
         * router composed in the Application instance.
         */

        $router = $app->getLocator()->get('Zf2Mvc\Router\SimpleRouteStack');
        foreach ($this->config->routes as $name => $config) {
            $class   = $config->type;
            $options = $config->options;
            $route   = new $class($options);
            $router->addRoute($name, $route);
        }

        $app->setRouter($router);
    }

    protected function setupEvents(Application $app)
    {
        /**
         * Wire events into the Application's EventManager, and/or setup
         * static listeners for events that may be invoked.
         */
        $di     = $app->getLocator();
        $view   = $di->get('view');
        // Needed until I can figure out why DI isn't working
        $view->broker()->getClassLoader()->registerPlugin('url', 'site\View\Helper\Url');
        $url = $view->broker('url');
        $url->setRouter($app->getRouter());

        $layoutHandler = function($content, $response) use ($view) {
            // Layout
            $vars       = new ViewVariables(array('content' => $content));
            $layout     = $view->render('layouts/layout.phtml', $vars);

            $response->setContent($layout);
        };

        $events = StaticEventManager::getInstance();

        // View Rendering
        $events->attach('Zf2Mvc\Controller\ActionController', 'dispatch.post', function($e) use ($view, $layoutHandler) {
            $vars       = $e->getParam('__RESULT__');
            if ($vars instanceof Response) {
                return;
            }

            $response   = $e->getParam('response');
            if ($response->getStatusCode() == 404) {
                // Render 404 responses differently
                return;
            }

            $request    = $e->getParam('request');
            $routeMatch = $request->getMetadata('route-match');
            $controller = $routeMatch->getParam('controller', 'error');
            $action     = $routeMatch->getParam('action', 'index');
            $script     = $controller . '/' . $action . '.phtml';
            $vars       = new ViewVariables($vars);

            // Action content
            $content    = $view->render($script, $vars);

            // Layout
            $layoutHandler($content, $response);
            return $response;
        });

        // Render 404 pages
        $events->attach('Zf2Mvc\Controller\ActionController', 'dispatch.post', function($e) use ($view, $layoutHandler) {
            $vars       = $e->getParam('__RESULT__');
            if ($vars instanceof Response) {
                return;
            }

            $response   = $e->getParam('response');
            if ($response->getStatusCode() != 404) {
                // Only handle 404's
                return;
            }

            $vars = array('message' => 'Page not found.');

            $content = $view->render('error/index.phtml', $vars);

            // Layout
            $layoutHandler($content, $response);
            return $response;
        });

        // Error handling
        $app->events()->attach('dispatch.error', function($e) use ($view, $layoutHandler) {
            $error   = $e->getParam('error');
            $app     = $e->getTarget();

            switch ($error) {
                case Application::ERROR_CONTROLLER_NOT_FOUND:
                    $vars = array(
                        'message' => 'Page not found.',
                    );
                    break;
                case Application::ERROR_CONTROLLER_INVALID:
                default:
                    $vars = array(
                        'message' => 'Unable to serve page; invalid controller.',
                    );
                    break;
            }

            $content = $view->render('error/index.phtml', $vars);

            // Layout
            $response = $app->getResponse();
            $layoutHandler($content, $response);
            return $response;
        });
    }
}
