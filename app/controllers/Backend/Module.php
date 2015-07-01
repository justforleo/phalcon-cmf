<?php
namespace Modules\Backend;

use Phalcon\Loader,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Volt as VoltEngine,
    Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Register a specific autoloader for the module
     */
    function registerAutoloaders(\Phalcon\DiInterface $di = null)
    {
        $loader = new Loader();
        $module = $di->getShared('router')->getModuleName();
        $namespace = $di->getShared('router')->getNamespaceName();
        $namespace = str_replace(['Models','Controllers'],"",$namespace);
        $loader->registerNamespaces(
            array( // 基于index文件的位置开始写
                $namespace.'Controllers'=> '../app/controllers/Backend/Controllers',
                $namespace.'Models' => '../app/controllers/Backend/models/',
            )
        )->register();
    }

    /**
     * Register specific services for the module
     */
    function registerServices(\Phalcon\DiInterface $di)
    {
        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Modules\Backend\Controllers');
            return $dispatcher;
        });

        $config = $di->getShared('config');

        $di->set('view', function () use ($config,$di) {
            $view = new View();
            $router = $di->getShared('router');
            /*
             * @todo 给layouts等目录统一变量
             * */
            $view->setViewsDir(__DIR__ . '/views/');
            $view->setLayoutsDir('/../../../layouts/'); // 多模块的话， 可能会有多个风格，所以需要切换layout,这里的Path是根据当前module的Path向上走的
            $view->setLayout('adminCommon');
            $view->registerEngines(array(
                '.volt' => function ($view, $di) use ($config) {
                    $volt = new VoltEngine($view, $di);
                    $volt->setOptions(array(
                        'compiledPath' => $config->application->cacheDir,
                        'compiledSeparator' => '_'
                    ));
                    return $volt;
                },
                '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
            ));
            return $view;
        }, true);
    }
}


