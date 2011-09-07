<?php
namespace site\View\Helper;

use Zend\View\Helper\AbstractHelper,
    Zf2Mvc\Router\RouteStack;

class Url extends AbstractHelper
{
    protected $router;

    public function setRouter(RouteStack $router)
    {
        $this->router = $router;
    }

    public function direct($params = array(), $options = array())
    {
        if (null === $this->router) {
            return '';
        }

        return $this->router->assemble($params, $options);
    }
}
