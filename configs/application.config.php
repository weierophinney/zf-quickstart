<?php
return new Zend\Config\Config(array(
    'module_paths' => array(
        realpath(__DIR__ . '/../modules'),
    ),
    'modules' => array(
        'Zf2Module',
        'Zf2Mvc',
        'site',
        'Guestbook',
    ),
));
