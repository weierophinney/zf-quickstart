<?php
ini_set('display_errors', true);
error_reporting(-1);

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(__DIR__ . '/../library'),
    get_include_path(),
)));

require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\ClassMapAutoloader' => array(
        __DIR__ . '/../modules/Zf2Mvc/classmap.php',
        __DIR__ . '/../modules/site/classmap.php',
        __DIR__ . '/../modules/Guestbook/classmap.php',
    ),
    'Zend\Loader\StandardAutoloader' => array(
    ),
));

// Configuration
$config = include __DIR__ . '/../configs/application.config.php';
if (isset($config->{APPLICATION_ENV})) {
    $config = $config->{APPLICATION_ENV};
}

include_once __DIR__ . '/../Bootstrap.php';
$bootstrap = new Bootstrap($config);

$application = new Zf2Mvc\Application;
$bootstrap->bootstrap($application);

$application->run()->send();
