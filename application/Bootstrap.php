<?php

use Zend\Config\Config,
    Zend\EventManager\EventManager,
    Zend\Loader\ResourceAutoloader,
    Zend\Mvc\Application,
    Zend\Mvc\Router\SimpleRouteStack,
    Zend\View\PhpRenderer as View,
    Zf1Compat\Dispatcher;

class Bootstrap extends BaseBootstrap
{
    protected $config;
    protected $events;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->events = new EventManager(array(
            'Zend\Mvc\Application',
        ));
    }

    public function bootstrap(Application $app)
    {
        $app->setEventManager($this->events);
        $this->initializeAutoloader($app);
        $this->initializeRouter($app);
        $this->initializeDispatcher($app);
        // TODO:
        // View layer and error handling
    }

    public function initializeAutoloader()
    {
        $path       = $this->config->resources->frontController->controllerDirectory;
        $autoloader = new ResourceAutoloader();
        $autoloader->setNamespace('Application')
                   ->setBasePath($path);
        $autoloader->register();
    }

    public function initializeRouter(Application $app)
    {
        $router = new SimpleRouteStack();
        foreach ($this->config->routes as $name => $config) {
            $class   = $config->type;
            $options = $config->options;
            $route   = new $class($options);
            $router->addRoute($name, $route);
        }
        $app->setRouter($router);
        $this->events->attach('route', array($app, 'route'));
    }

    public function initializeDispatcher()
    {
        $path       = $this->config->resources->frontController->controllerDirectory;
        $dispatcher = new Dispatcher();
        $dispatcher->addPath($path, 'Application');
        $this->events->attach('dispatch', array($dispatcher, 'dispatch'));
    }

    protected function getView()
    {
        $view = new View();
        $view->plugin('doctype')->setDoctype('XHTML1_STRICT');
        return $view;
    }
}

