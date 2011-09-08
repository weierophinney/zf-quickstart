<?php

namespace site;

use InvalidArgumentException,
    RecursiveDirectoryIterator,
    Zend\Loader\AutoLoaderFactory,
    Zend\Config\Config;

class Information
{
    public function getConfig($env = null)
    {
        $config = new Config(include __DIR__ . '/configs/site.config.php');
        if (!$env) {
            return $config;
        }
        if (isset($config->$env) && $config->$env instanceof Config) {
            return $config->$env;
        }

        throw new \InvalidArgumentException('Unrecognized environment provided');
    }

    public function init()
    {
        $this->initAutoloader();
    }

    protected function initAutoloader()
    {
        AutoloaderFactory::factory(array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/classmap.php',
            )
        ));
    }

    public function getClassmap()
    {
        return include __DIR__ . '/classmap.php';
    }

    public function getViewScripts()
    {
        return RecursiveDirectoryIterator(__DIR__ . '/views');
    }
}
