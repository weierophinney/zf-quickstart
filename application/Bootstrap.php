<?php

use Zend\Config\Config,
    Zend\Di\Configuration,
    Zend\Di\Definition,
    Zend\Di\Definition\Builder,
    Zend\Di\DependencyInjector,
    Zend\EventManager\StaticEventManager;

class Bootstrap
{
    protected $config;
    protected $di;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function execute()
    {
        $this->defineDependencies();
        $this->defineEventHandlers();
    }

    public function getContainer()
    {
        return $this->di;
    }

    public function defineDependencies()
    {
        $builder = new Definition\BuilderDefinition;

        $builder->addClass(($router = new Builder\PhpClass));
        $router->setName('Zf2\Mvc\Router');
        $router->addInjectionMethod(($addRoutes = new Builder\InjectionMethod));
        $addRoutes->setName('addRoutes')
                  ->addParameter('routes', null);

        // Use both our Builder Definition as well as the default 
        // RuntimeDefinition, builder first
        $definition = new Definition\AggregateDefinition;
        $definition->addDefinition($builder);
        $definition->addDefinition(new Definition\RuntimeDefinition);
        
        // Now make sure the DependencyInjector understands it
        $this->di = new DependencyInjector;
        $this->di->setDefinition($definition);

        $config   = new Configuration($this->getDiConfiguration());
        $config->configure($this->di);
    }

    public function defineEventHandlers()
    {
        $events = StaticEventManager::getInstance();
        $events->attach('Zf2\Mvc\FrontController', 'dispatch.post', function($e) {
            $content = "In event " . $e->getName() . "<br />\n";

            $result = $e->getParam('__RESULT__');
            $content .= var_export($result, 1) . "<br />\n";
            $response = $e->getParam('response');
            $response->setContent($content);
            return $response;
        });
    }

    protected function getDiConfiguration()
    {
        return $this->config->di;
        /*
        return array(
            'instance' => array(
                'alias' => array(
                    'events'   => 'Zend\EventManager\EventManager',
                    'index'    => 'IndexController',
                    'response' => 'Zf2\Http\Response',
                    'router'   => 'Zf2\Mvc\Router',
                ),
                'preferences' => array(
                    'Zf2\Stdlib\Parameters' => array('Zf2\Http\Parameters'),
                ),
                'properties' => array(
                    'Zf2\Mvc\Router' => array(
                        'routes' => array(
                            array(
                                'class' => 'Zf2\Mvc\Route\StaticRoute',
                                'params' => array(
                                    'path' => '/',
                                    'params' => array('controller' => 'index', 'action' => 'index'),
                                ),
                            ),
                            array('params' => array(
                                'regex' => '#^/(?P<controller>[^/]+)(/(<?P<action>[^/]+))?',
                                'spec'  => '/{controller}/{action}',
                            )),
                        ),
                    ),
                ),
            ),
        );
         */
    }
}
