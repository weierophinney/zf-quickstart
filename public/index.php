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

require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        'namespaces' => array(
            'Application' => APPLICATION_PATH,
            'Zf1Compat'   => APPLICATION_PATH . '/../library/Zf1Compat',
        ),
    ),
));
require __DIR__ . '/../modules/ZendMvc/autoload_register.php';

$config      = new Zend\Config\Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
$bootstrapClass = $config->bootstrap->class;
// ZF1 don't use namespace for Bootstrap class in the default config
if (!class_exists($bootstrapClass)) {
    $bootstrapClass = $config->appnamespace . '\\' . $bootstrapClass;
}
$bootstrap   = new $bootstrapClass($config);
$application = new Zend\Mvc\Application;
$bootstrap->bootstrap($application);

$application->run()->send();
