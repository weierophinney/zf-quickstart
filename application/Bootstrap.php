<?php

use Application\DiDefinition as AppDiDefinition,
    Zf2\DiDefinition as Zf2DiDefinition,
    Zend\Config\Config,
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
        // Use a three-fold strategy:
        // - Builder (for fine-grained control)
        // - Compiler (for pre-compiling definitions)
        // - Runtime (as a catch-all for classes not in either of the above)

        // Builder
        $builder = new Definition\BuilderDefinition;

        // Compiler
        $application = new AppDiDefinition;
        $zf2Mvc      = new Zf2DiDefinition;

        $definition = new Definition\AggregateDefinition;
        $definition->addDefinition($builder);
        $definition->addDefinition($application);
        $definition->addDefinition($zf2Mvc);
        $definition->addDefinition(new Definition\RuntimeDefinition);
        
        // Now make sure the DependencyInjector understands it
        $this->di = new DependencyInjector;
        $this->di->setDefinition($definition);

        // Seed the DI container with configuration
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
