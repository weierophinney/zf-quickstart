<?php

namespace site;

use InvalidArgumentException,
    RecursiveDirectoryIterator;

class Information
{
    public function getConfig($env = null)
    {
        $config = include __DIR__ . '/configs/site.config.php';
        if (!$env) {
            return $config;
        }
        if (array_key_exists($env, $config)) {
            return $config[$env];
        }

        throw new \InvalidArgumentException('Unrecognized environment provided');
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
