<?php

namespace Application\Controller;

use Zf2\Mvc\ActionController;

class IndexController extends ActionController
{
    public function index()
    {
        return array('content' => 'IT WORKS!');
    }
}
