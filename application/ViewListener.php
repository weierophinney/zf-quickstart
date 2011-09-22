<?php

namespace Application;

use ArrayAccess,
    Zend\EventManager\EventCollection,
    Zend\EventManager\ListenerAggregate,
    Zend\Mvc\MvcEvent,
    Zend\View\Renderer;

class ViewListener implements ListenerAggregate
{
    protected $layout;
    protected $listeners = array();
    protected $view;

    public function __construct(Renderer $renderer, $layout = 'layout.phtml')
    {
        $this->view   = $renderer;
        $this->layout = $layout;
    }

    public function attach(EventCollection $events)
    {
        $this->listeners[] = $events->attach('dispatch', array($this, 'renderView'), -100);
        $this->listeners[] = $events->attach('dispatch', array($this, 'renderLayout'), -1000);
    }

    public function detach(EventCollection $events)
    {
        foreach ($this->listeners as $key => $listener) {
            $events->detach($listener);
            unset($this->listeners[$key]);
            unset($listener);
        }
    }

    public function renderView(MvcEvent $e)
    {
        $routeMatch = $e->getRouteMatch();
        $controller = $routeMatch->getParam('controller', 'index');
        $action     = $routeMatch->getParam('action', 'index');
        $script     = $controller . '/' . $action . '.phtml';

        $vars       = $e->getResult();
        if (is_scalar($vars)) {
            $vars = array('content' => $vars);
        } elseif (is_object($vars) && !$vars instanceof ArrayAccess) {
            $vars = (array) $vars;
        }

        $content    = $this->view->render($script, $vars);

        $e->setResult($content);
        return $content;
    }

    public function renderLayout(MvcEvent $e)
    {
        $content  = $e->getResult();
        $layout   = $this->view->render($this->layout, array('content' => $content));
        $response = $e->getResponse();
        $response->setContent($layout);
        return $response;
    }
}
