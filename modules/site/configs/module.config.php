<?php
$production = array(
    'bootstrap_class'    => 'site\Bootstrap',
    'display_exceptions' => false,

    'di' => array( 'instance' => array(
        'alias' => array(
            'index' => 'site\Controller\IndexController',
            'error' => 'site\Controller\ErrorController',
            'view'  => 'Zend\View\PhpRenderer',
        ),

        'Zend\View\HelperLoader' => array('parameters' => array(
            'map' => array(
                'url' => 'site\View\Helper\Url',
            ),
        )),
        'Zend\View\HelperBroker' => array('parameters' => array(
            'loader' => 'Zend\View\HelperLoader',
        )),
        'Zend\View\PhpRenderer' => array('parameters' => array(
            'resolver' => 'Zend\View\TemplatePathStack',
            'options' => array(
                'script_paths' => array(
                    'site' => __DIR__ . '/../views',
                ),
            ),
            'broker' => 'Zend\View\HelperBroker',
        )),
    )),

    'routes' => array(
        'default' => array(
            'type'    => 'Zend\Mvc\Router\Http\Regex',
            'options' => array(
                'regex' => '/(?P<controller>[^/]+)(/(?P<action>[^/]+)?)?',
                'defaults' => array(
                    'controller' => 'error',
                    'action'     => 'index',
                ),
                'spec' => '/%controller%/%action%',
            ),
        ),
        'home' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route' => '/',
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
        'trigger-error' => array(
            'type' => 'Zend\Mvc\Router\Http\Literal',
            'options' => array(
                'route'    => '/trigger-error',
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'trigger-error',
                ),
            ),
        ),
    ),
);

$staging     = $production;
$testing     = $production;
$development = $production;

$testing['display_exceptions']     = true;
$development['display_exceptions'] = true;

$config = compact('production', 'staging', 'testing', 'development');
return $config;
