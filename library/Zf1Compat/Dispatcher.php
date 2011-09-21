<?php

namespace Zf1Compat;

use Zend\Mvc\MvcEvent,
    Zend\Stdlib\Dispatchable,
    Zend\Stdlib\RequestDescription as Request,
    Zend\Stdlib\ResponseDescription as Response;

class Dispatcher
{
    protected $paths = array();

    public function addPath($path, $module = '')
    {
        if (empty($module)) {
            if (!isset($this->paths['__DEFAULT__'])) {
                $this->paths['__DEFAULT__'] = array();
            }
            if (in_array($path, $this->paths['__DEFAULT__'])) {
                return $this;
            }
            $this->paths['__DEFAULT__'][] = $path;
            return $this;
        }
        $module = static::normalizeName($module);
        $this->paths[$module] = $path;
        return $this;
    }

    public function dispatch(MvcEvent $e)
    {
        $routeMatch = $e->getRouteMatch();
        $controller = $routeMatch->getParam('controller', 'index');
        $class      = static::normalizeName($controller);
        $module     = $routeMatch->getParam('module', '__DEFAULT__');

        if (($module == '__DEFAULT__')) {
            if (class_exists($class)) {
                goto dispatch;
            }
            goto resolveByPath;
        }

        $module = static::normalizeName($module);
        $class  = $module . '\\' . $class;
        if (class_exists($class)) {
            goto dispatch;
        }

        // Resolve the controller by path
        resolveByPath:

        if (!isset($this->paths[$module])) {
            throw new \DomainException(sprintf(
                'No controller paths found for controller "%s" in module "%s"',
                $controller,
                $module
            ));
        }

        $found = false;
        $file  = static::normalizeName($controller) . '.php';
        $file  = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $file);
        foreach ((array) $this->paths[$module] as $path) {
            $filename = $path . DIRECTORY_SEPARATOR . $file;
            if (file_exists($filename)) {
                require_once $filename;
                $found = true;
                break;
            }
        }

        if (!$found || !class_exists($class)) {
            throw new \DomainException(sprintf(
                'Unable to locate controller class "%s"',
                $class
            ));
        }

        // Ready to dispatch!
        dispatch:

        $dispatchable = new $class();
        if (!$dispatchable instanceof Dispatchable) {
            throw new \DomainException(sprintf(
                'Controller "%s" does not implement Zend\Stdlib\Dispatchable',
                $class
            ));
        }

        return $dispatchable->dispatch($e->getRequest(), $e->getResponse(), $e);
    }

    public static function normalizeName($controller)
    {
        $class  = str_replace(array('-', '.'), ' ', $controller);
        $class  = ucwords($class);
        $class  = str_replace(' ', '', $class);
        $class .= 'Controller';
        return $class;
    }
}
