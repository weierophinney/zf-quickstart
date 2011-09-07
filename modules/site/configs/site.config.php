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

        /*
        'Zend\View\HelperLoader' => array('methods' => array(
            'registerPlugins' => array(
                'map' => array(
                    'url' => 'site\View\Helper\Url',
                ),
            ),
        )),
        'Zend\View\HelperBroker' => array('methods' => array(
            'setClassLoader' => array(
                'loader' => 'Zend\View\HelperLoader',
            ),
        )),
         */
        'Zend\View\PhpRenderer' => array('methods' => array(
            'setResolver' => array(
                'resolver' => 'Zend\View\TemplatePathStack',
                'options' => array(
                    'script_paths' => array(
                        'site' => __DIR__ . '/../views',
                    ),
                ),
            ),
            'setBroker' => array(
                'broker' => 'Zend\View\HelperBroker',
            )
        )),
    )),

    'routes' => array(
        'default' => array(
            'type'    => 'Zf2Mvc\Router\Http\Regex',
            'options' => array(
                'regex' => '/(?P<controller>[^/]+)(/(?P<action>[^/]+)?)?',
                'defaults' => array(
                    'controller' => 'error',
                    'action'     => 'index',
                ),
                'spec' => '/%s/%s',
            ),
        ),
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
    ),
);

$staging     = $production;
$testing     = $production;
$development = $production;

$config = compact('production', 'staging', 'testing', 'development');
return $config;
