<?php

namespace Application;

use Zend\Config\Config,
    Zend\Db\Db,
    Zend\Db\Table\AbstractTable as DbTable,
    Zend\EventManager\EventManager,
    Zend\Loader\ResourceAutoloader,
    Zend\Mvc\Application,
    Zend\Mvc\Router\SimpleRouteStack,
    Zend\View\PhpRenderer as View,
    Zf1Compat\Dispatcher;

class Bootstrap
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
        $this->configurePhpEnvironment();
        $this->initializeAutoloader($app);
        $this->initializeRouter($app);
        $this->initializeDispatcher($app);
        $this->initializeDb($app);
        $this->initializeView($app);
    }

    public function configurePhpEnvironment()
    {
        foreach ($this->config->phpSettings as $key => $value) {
            if (is_scalar($value)) {
                ini_set($key, $value);
            }
        }

        if (isset($config->includePaths)) {
            $path = implode(PATH_SEPARATOR, $config->includePaths);
            set_include_path($path . PATH_SEPARATOR . get_include_path());
        }
    }

    public function initializeAutoloader()
    {
        $autoloader = new ResourceAutoloader(array(
            'namespace' => $this->config->appnamespace,
            'basePath'  => APPLICATION_PATH,
        ));
        $autoloader->addResourceTypes(array(
            'model' => array(
                'path'      => 'models',
                'namespace' => 'Model',
            ),
            'dbtable' => array(
                'path'      => 'models/DbTable',
                'namespace' => 'Model\DbTable',
            ),
            'form' => array(
                'path'      => 'forms',
                'namespace' => 'Form',
            ),
            'view_helpers' => array(
                'path'      => 'views/helpers',
                'namespace' => 'View\Helper',
            ),
            'view_filters' => array(
                'path'      => 'views/filters',
                'namespace' => 'View\Filter',
            ),
            'mappers' => array(
                'path'      => 'models/mappers',
                'namespace' => 'Model\Mapper',
            ),
            'services' => array(
                'path'      => 'services',
                'namespace' => 'Service',
            ),
            'plugins' => array(
                'path'      => 'plugins',
                'namespace' => 'Plugin',
            ),
        ));
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

    public function initializeView($app)
    {
        $view = $this->getView($app);
        $viewListener = new ViewListener($view);
        $this->events->attachAggregate($viewListener);
    }

    public function initializeDb($app)
    {
        if (!isset($this->config->resources->db)) {
            return;
        }

        $db = Db::factory($this->config->resources->db);
        DbTable::setDefaultAdapter($db);
    }

    protected function getView($app)
    {
        $view = new View();

        // paths
        $paths = array(
            __DIR__ . '/views/scripts',
        );
        if (isset($this->config->resources->layout->layoutPath)) {
            array_unshift($paths, $this->config->resources->layout->layoutPath);
        }
        $view->resolver()->addPaths($paths);

        // helpers/plugins
        $view->plugin('doctype')->setDoctype('XHTML1_STRICT');
        $view->getBroker()->getClassLoader()->registerPlugin('url', 'Application\View\Helper\Url');
        $urlHelper = $view->plugin('url');
        $urlHelper->setRouter($app->getRouter());

        return $view;
    }
}

