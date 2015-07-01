<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/6/25
 * Time: 上午10:47
 */


$frontendRouterGroup->add('/users/:controller/:action',[
    'namespace' => 'Modules\Users\Controllers',
    'module' => 'Users',
    'controller' => 1,
    'action' => 2
]);

$adminRouterGroup->add('/users/:controller/:action',[
    'namespace' => 'Modules\Backend\Controllers',
    'module' => 'Users',
    'controller' => 1,
    'action' => 2
]);
