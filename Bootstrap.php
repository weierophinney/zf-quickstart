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

        $router = $app->getRouter();
        foreach ($this->config->routes as $name => $config) {
            $class   = $config->type;
            $options = $config->options;
            $route   = new $class($options);
            $router->addRoute($name, $route);
        }
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

        $events = StaticEventManager::getInstance();
        $events->attach('Zf2Mvc\Controller\ActionController', 'dispatch.post', function($e) use ($view) {
            $vars       = $e->getParam('__RESULT__');
            if ($vars instanceof Response) {
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
            $vars       = new ViewVariables(array('content' => $content));
            $layout     = $view->render('layouts/layout.phtml', $vars);

            $response   = $e->getParam('response');
            $response->setContent($layout);
            return $response;
        });
    }
}
