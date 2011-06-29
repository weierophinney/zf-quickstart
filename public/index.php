<?php
ini_set('display_errors', true);
error_reporting(-1);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

require_once 'Zend/Loader/ClassMapAutoloader.php';
$loader = new Zend\Loader\ClassMapAutoloader(array(
    __DIR__ . '/../library/.zf2-classmap.php',
    __DIR__ . '/../library/.classmap.php',
    __DIR__ . '/../application/.classmap.php',
));
$loader->register();

// Configuration
$config = new Zend\Config\Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
foreach ($config->phpSettings as $key => $value) {
    ini_set($key, $value);
}

// Create application, bootstrap, and run
$bootstrapClass = $config->bootstrap;
$bootstrap = new $bootstrapClass($config);
$bootstrap->execute();

$di      = $bootstrap->getContainer();
$request = new Zf2\Http\Request();
$front   = new Zf2\Mvc\FrontController($di);
$front->dispatch($request)->send();
