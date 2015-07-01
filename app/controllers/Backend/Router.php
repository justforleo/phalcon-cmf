<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/6/25
 * Time: 上午10:47
 */


$adminRouterGroup->add('/Backend/:controller/:action',[
    'namespace' => 'Modules\Backend\Controllers',
    'module' => 'Backend',
    'controller' => 1,
    'action' => 2
]);

/*
$adminRouterGroup->add('/:module|moduleName/(Admin)/:action',[
    'module' => 1,
    'controller' => 2,
    'action' => 3
]);
$frontendRouterGroup->add('/:controller/:action',[
    'namespace' => 'Modules\Frontend\Controllers',
    'module' => 'Backend',
    'controller' => 1,
    'action' => 2
]);
*/
