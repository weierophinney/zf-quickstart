<?php
$production = array(
    'di' => array( 'instance' => array(
        'alias' => array(
            'index' => 'site\Controller\IndexController',
            'error' => 'site\Controller\ErrorController',
            'view'  => 'Zend\View\PhpRenderer',
        ),

        'preferences' => array(
            'Zend\View\Renderer' => 'Zend\View\PhpRenderer',
        ),

        'Zend\View\PhpRenderer' => array('methods' => array(
            'setResolver' => array(
                'resolver' => 'Zend\View\TemplatePathStack',
                'options' => array(
                    'script_paths' => array(
                        __DIR__ . '/../views',
                    ),
                ),
            ),
        )),
    )),

    'routes' => array(
        'home' => array(
            'type' => 'Zf2Mvc\Router\Http\Literal',
            'options' => array(
                'route' => '/',
                'defaults' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
        'default' => array(
            'type'    => 'Zf2Mvc\Router\Http\Regex',
            'options' => array(
                'regex' => '#^/(?P<controller>[^/]+])(/(?P<action>[^/]+))?#',
                'defaults' => array(
                    'controller' => 'error',
                    'action'     => 'index',
                ),
                'spec' => '/%s/%s',
            ),
        ),
    )
);

$staging     = $production;
$testing     = $production;
$development = $production;

$config = compact('production', 'staging', 'testing', 'development');
return $config;
