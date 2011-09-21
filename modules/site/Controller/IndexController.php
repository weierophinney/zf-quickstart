<?php

namespace site\Controller;

use Zend\Mvc\Controller\ActionController;

class IndexController extends ActionController
{
    public function indexAction()
    {
        return array('content' => 'IT WORKS!');
    }
}
