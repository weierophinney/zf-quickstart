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

        $router = $builder->createClass('Zf2\Mvc\Router');
        $router->createInjectionMethod('addRoutes')
               ->addParameter('routes', null);

        $db = $builder->createClass($this->config->db->adapter);
        $db->createInjectionMethod('__construct')
           ->addParameter('config', null);

        $gbTable = $builder->createClass('QuickStart\Model\DbTable\Guestbook');
        $gbTable->createInjectionMethod('__construct')
                ->addParameter('config', $this->config->db->adapter);

        $gbMapper = $builder->createClass('QuickStart\Model\GuestbookMapper');
        $gbMapper->createInjectionMethod('setDbTable')
                 ->addParameter('dbTable', 'QuickStart\Model\DbTable\Guestbook');

        $view = $builder->createClass('Zend\View\PhpRenderer');
        $view->createInjectionMethod('setResolver')
             ->addParameter('name', 'Zend\View\TemplatePathStack');

        $viewPaths = $builder->createClass('Zend\View\TemplatePathStack');
        $viewPaths->createInjectionMethod('setPaths')
                  ->addParameter('paths', null);


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
        $view   = $this->di->get('view');
        $events->attach('Zf2\Mvc\FrontController', 'dispatch.post', function($e) use ($view) {
            $content  = $view->render($e->getParam('request'), $e->getParam('__RESULT__'));
            $response = $e->getParam('response');
            $response->setContent($content);
            return $response;
        });
    }

    protected function getDiConfiguration()
    {
        return $this->config->di;
    }
}
