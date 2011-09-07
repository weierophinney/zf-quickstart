<?php
$production = array(
    'di' => array( 'instance' => array(
        'alias' => array(
            'guestbook'        => 'Guestbook\Controller\GuestbookController',
            'guestbook-db'     => 'Zend\Db\Adapter\Pdo\Sqlite',
            'guestbook-mapper' => 'Guestbook\Model\GuestbookMapper',
            'guestbook-table'  => 'Guestbook\Model\DbTable\Guestbook',
        ),

        'preferences' => array(
            'Zf2Mvc\Router\RouteStack' => 'Zf2Mvc\Router\SimpleRouteStack',
        ),

        'Guestbook\Controller\GuestbookController' => array(
            'parameters' => array(
                'mapper' => 'Guestbook\Model\GuestbookMapper',
                'router' => 'Zf2Mvc\Router\SimpleRouteStack',
            ),
        ),

        'Guestbook\Model\GuestbookMapper' => array('parameters' => array(
            'dbTable' => 'Guestbook\Model\DbTable\Guestbook',
        )),

        'Guestbook\Model\DbTable\Guestbook' => array('parameters' => array(
            'config' => 'Zend\Db\Adapter\Pdo\Sqlite',
        )),

        'Zend\Db\Adapter\Pdo\Sqlite' => array('parameters' => array(
            'config' => array('dbname' => __DIR__ . '/../data/guestbook.db'),
        )),

        'Zend\View\PhpRenderer' => array('methods' => array(
            'setResolver' => array(
                'resolver' => 'Zend\View\TemplatePathStack',
                'options' => array(
                    'script_paths' => array(
                        'guestbook' => __DIR__ . '/../views',
                    ),
                ),
            ),
        )),
    )),
);

$staging     = $production;
$testing     = $production;
$development = $production;

$config = compact('production', 'staging', 'testing', 'development');
return $config;
