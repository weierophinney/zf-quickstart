<?php

use Zf2\Stdlib\Request,
    Zf2\Mvc\RouteStack,
    Zend\View\Renderer;

class View
{
    protected $renderer;
    protected $router;

    public function render(Request $request, $model)
    {
        $script = $request->getMetadata('controller', 'index') 
                . DIRECTORY_SEPARATOR 
                . $request->getMetadata('action', 'index')
                . '.phtml';
        $vars = array(
            'content_script' => $script,
            'content'        => $model,
        );

        if (method_exists($this->renderer, 'broker')) {
            $broker = $this->renderer->broker();
            $broker->load('doctype')->setDoctype('XHTML11');
            $broker->getClassLoader()->registerPlugin('url', 'Application\View\Helper\Url');
            $broker->load('url')->setRouter($this->router);
        }

        return $this->renderer->render('layout.phtml', $vars);
    }

    public function setRenderer(Renderer $renderer)
    {
        if (method_exists($renderer, 'broker')) {
            $renderer->broker('doctype')->setDoctype('XHTML1');
        }
        $this->renderer = $renderer;
    }

    public function setRouter(RouteStack $router)
    {
        $this->router = $router;
    }
}
