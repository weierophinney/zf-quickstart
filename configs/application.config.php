<?php
$modules = array(
    'site'      => __DIR__ . '/../modules/site/configs/site.config.php',
    'guestbook' => __DIR__ . '/../modules/Guestbook/configs/guestbook.config.php',
);

$applicationConfig = new Zend\Config\Config(array(), true);
foreach ($modules as $module => $file) {
    $array             = include $file;
    $moduleConfig      = new Zend\Config\Config($array);
    $applicationConfig->merge($moduleConfig);
}

return $applicationConfig;
