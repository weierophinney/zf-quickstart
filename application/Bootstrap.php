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
        // Use both our Builder Definition as well as the default 
        // RuntimeDefinition, builder first.
        // We're not actually using the builder right now, however; everything 
        // we need to do can be done via configuration currently.
        $builder = new Definition\BuilderDefinition;

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
