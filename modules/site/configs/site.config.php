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
            'class' => 'Zf2Mvc\Router\Http\Literal',
            'params' => array(
                'path' => '/',
                'params' => array(
                    'controller' => 'index',
                    'action'     => 'index',
                ),
            ),
        ),
        'default' => array(
            'class' => 'Zf2Mvc\Router\Http\Regex',
            'params' => array(
                'regex' => '#^/(?P<controller>[^/]+])(/(?P<action>[^/]+))?#',
                'params' => array(
                    'controller' => 'index',
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
