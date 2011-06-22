<?php

use Zend\Application\Bootstrap as BaseBootstrap;

class Bootstrap extends BaseBootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->broker('doctype')->setDoctype('XHTML1_STRICT');
    }
}

