<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => '127.0.0.1',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'magic_shop',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/layouts/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'baseUri'        => '/',
        'adminPrefix'    => '/manage',
        'frontendPrefix' => '',
        'apiPrefix'      => '/api'
    ),
    'error' => array(
        'disableLog' => 0,
        'logPath' => __DIR__ . '/../logs/',
        'controllerNamespace' => '',
        'controller' => 'error',
        'action' => 'index',
        'viewpath' => '',
    ),
));
