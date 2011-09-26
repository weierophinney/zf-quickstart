<?php
return new Zend\Config\Config(array(
    'module_paths' => array(
        realpath(__DIR__ . '/../modules'),
    ),
    'modules' => array(
        'ZendModule',
        'ZendMvc',
        'site',
        'Guestbook',
    ),
));
