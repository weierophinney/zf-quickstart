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

        $builder->addClass(($db = new Builder\PhpClass));
        $db->setName($this->config->db->adapter);
        $db->addInjectionMethod(($dbConstruct = new Builder\InjectionMethod));
        $dbConstruct->setName('__construct')
                    ->addParameter('config', null);

        $builder->addClass(($gbTable = new Builder\PhpClass));
        $gbTable->setName('Application\Model\DbTable\Guestbook');
        $gbTable->addInjectionMethod(($gbTableConstruct = new Builder\InjectionMethod));
        $gbTableConstruct->setName('__construct')
                         ->addParameter('config', 'guestbook-db');

        $builder->addClass(($gbMapper = new Builder\PhpClass));
        $gbMapper->setName('Application\Model\GuestbookMapper');
        $gbMapper->addInjectionMethod(($gbMapperTable = new Builder\InjectionMethod));
        $gbMapperTable->setName('setDbTable')
                      ->addParameter('dbTable', 'guestbook-table');

        $builder->addClass(($view = new Builder\PhpClass));
        $view->setName('Zend\View\PhpRenderer');
        $view->addInjectionMethod(($viewResolver = new Builder\InjectionMethod));
        $viewResolver->setName('setResolver')
                     ->addParameter('name', 'Zend\View\TemplatePathStack');

        $builder->addClass(($templatePaths = new Builder\PhpClass));
        $templatePaths->setName('Zend\View\TemplatePathStack');
        $templatePaths->addInjectionMethod(($templatePathsAdd = new Builder\InjectionMethod));
        $templatePathsAdd->setName('setPaths')
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
