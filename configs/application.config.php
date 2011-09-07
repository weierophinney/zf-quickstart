<?php
$modules = array(
    'site' => __DIR__ . '/../modules/site/configs/site.config.php',
);

$applicationConfig = array();
foreach ($modules as $module => $file) {
    $moduleConfig      = include $file;
    $applicationConfig = array_merge_recursive($applicationConfig, $moduleConfig);
}
return $applicationConfig;
