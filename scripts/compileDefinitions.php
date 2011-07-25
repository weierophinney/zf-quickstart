<?php
ini_set('display_errors', true);
error_reporting(E_ALL | E_STRICT);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

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

echo "COMPILING definitions for ZF2 MVC ... \n";
/*
$scanner = new Zend\Code\Scanner\DirectoryScanner(array(
    __DIR__ . '/../library/Zf2/Stdlib/',
));
var_export($scanner->getClasses());
exit;
 */
// Compile a definition for the ZF2 MVC library
$compiler = new Zend\Di\Definition\Compiler();
$compiler->addCodeScannerDirectory(new Zend\Code\Scanner\DirectoryScanner(array(
    __DIR__ . '/../library/Zf2/',
)));
$definition = $compiler->compile();

echo "    GENERATING DI definition class ... \n";
 
// Generate a Definition class for this information
$codeGenerator = new Zend\CodeGenerator\Php\PhpFile();
$codeGenerator->setClass(($class = new Zend\CodeGenerator\Php\PhpClass()));
$class->setNamespaceName('Zf2');
$class->setName('DiDefinition');
$class->setExtendedClass('\Zend\Di\Definition\ArrayDefinition');
$class->setMethod(array(
    'name' => '__construct',
    'body' => 'parent::__construct(' . var_export($definition->toArray(), true) . ');'
));
$path = __DIR__ . '/../library/Zf2DiDefinition.php';
file_put_contents($path, $codeGenerator->generate());

echo "    File written to $path\n[DONE]\n";

echo "COMPILING definitions for application resources ... \n";

// Compile a definition for the quickstart application library
// In this case, the Application is dependent on Zend\Db, so we also include that.
// Ideally, we'll be able to include a Zend\Db DI definition in ZF2, and simply 
// tell the compiler about that so it has dependency information.
$compiler = new Zend\Di\Definition\Compiler();
$compiler->addCodeScannerDirectory(new Zend\Code\Scanner\DirectoryScanner(array(
    __DIR__ . '/../application/',
    __DIR__ . '/../library/Zend/Db',
)));
$definition = $compiler->compile();

echo "    GENERATING DI definition class ... \n";
 
// Generate a Definition class for this information
$codeGenerator = new Zend\CodeGenerator\Php\PhpFile();
$codeGenerator->setClass(($class = new Zend\CodeGenerator\Php\PhpClass()));
$class->setNamespaceName('Application');
$class->setName('DiDefinition');
$class->setExtendedClass('\Zend\Di\Definition\ArrayDefinition');
$class->setMethod(array(
    'name' => '__construct',
    'body' => 'parent::__construct(' . var_export($definition->toArray(), true) . ');'
));
$path = __DIR__ . '/../application/ApplicationDiDefinition.php';
file_put_contents($path, $codeGenerator->generate());

echo "    File written to $path\n[DONE]\n";


