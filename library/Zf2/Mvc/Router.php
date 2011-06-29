<?php
namespace Zf2\Mvc;

use ArrayObject,
    ReflectionClass,
    Traversable,
    Zend\EventManager\EventCollection,
    Zend\EventManager\EventManager,
    Zf2\Stdlib\Request;

class Router extends ArrayObject implements RouteStack
{
    protected $current;
    protected $events;
    protected $request;

    public function events(EventCollection $events = null)
    {
        if (null !== $events) {
            $this->events = $events;
        } elseif (null === $this->events) {
            $this->events = new EventManager(array(__CLASS__, get_called_class(), 'router'));
        }
        return $this->events;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function match(Request $request)
    {
        $events = $this->events();
        $params = compact('request');
        $events->trigger(__FUNCTION__ . '.pre', $this, $params);
        foreach ($this as $name => $route) {
            $params = array('request' => $request, 'route' => array('name' => $name, 'route' => $route));
            if (false !== $result = $route->match($request)) {
                $route->setRequest($request);
                $this->current     = $route;
                $params['success'] = true;
                $events->trigger(__FUNCTION__ . '.post', $this, $params);
                return $result;
            }
            $params['success'] = false;
        }
        $events->trigger(__FUNCTION__ . '.post', $this, $params);
        return false;
    }

    public function assemble(array $params = array(), array $options = array())
    {
        $name = isset($options['name']) ? $options['name'] : false;
        if (!$name) {
            $route = $this->getCurrentRoute();
        } elseif (!isset($this[$name])) {
            throw new Exception(sprintf(
                'Cannot locate route by name of "%s"',
                $name
            ));
        } else {
            $route = $this[$name];
            unset($options['name']);
        }
        if (null !== $this->request) {
            $route->setRequest($this->request);
        }
        return $route->assemble($params, $options);
    }

    public function addRoute(Route $route, $name = null)
    {
        if (null === $name) {
            $name = get_class($route);
            if (isset($this[$name])) {
                $name .= uniqid();
            }
        }
        $this[$name] = $route;
        return $this;
    }

    public function addRoutes($routes)
    {
        foreach ($routes as $name => $route) {
            if (is_array($route) 
                || (!($route instanceof Route)
                    && $route instanceof Traversable
                )
            ) {
                $route = $this->getRouteFromConfig($route);
            }
            $this->addRoute($route, $name);
        }
        return $this;
    }

    public function getCurrentRoute()
    {
        return $this->current;
    }

    protected function getRouteFromConfig($config)
    {
        $class  = __NAMESPACE__ . '\Route\RegexRoute';
        $params = array();
        foreach ($config as $key => $value) {
            switch ($key) {
                case 'class':
                    $class = $value;
                    break;
                case 'params':
                    $params = $value;
                    break;
                default:
                    break;
            }
        }
        $r = new ReflectionClass($class);
        return $r->newInstanceArgs($params);
    }
}
