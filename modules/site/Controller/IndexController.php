<?php

namespace site\Controller;

use Zf2Mvc\Controller\ActionController;

class IndexController extends ActionController
{
    public function indexAction()
    {
        return array('content' => 'IT WORKS!');
    }
}
