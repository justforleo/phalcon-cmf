<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group as RouterGroup;
use Phalcon\Cache\Backend\Redis as CacheRedis;
/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */

$di->set('redis',function()  {
    $redis = new Redis();
    if (!$redis) {
        return false;
    }
    $redis->pconnect("localhost");
    $redis->slaveof();
    return $redis;
//    $frontCache = new Phalcon\Cache\Frontend\Data();
//    return new \Phalcon\Cache\Backend\Redis($frontCache);
});

// 获取所有controller下的模块
$di->set('modules',function() use($di) {
    $cacheRedis = $di->getRedis();
    $dirRes = $cacheRedis->get('application:modules');
    $modules = json_decode($dirRes);
    if (!$modules) {
        $modules = shell_exec("ls ../app/controllers/ |grep -E '[^\.php]$'|tr '\n' ','");
        $modules = explode(",",$modules);
        array_pop($modules);
        $cacheRedis->set('application:modules',json_encode($modules));
    }
    return $modules;
});

//遍历注册模块
$di->set('registerModules',function() use($di) {

    $modules = $di->get('modules');
    $regModules = [];

    foreach ($modules as $key => $val) {
        $regModules[$val] = [
            'className' => "Modules\\$val\Module",
            'path'      => "../app/controllers/$val/Module.php"
        ];
    }
    return $regModules;
});

// 加载每个模块里的路由文件
$di->set('router',function() use ($di,$config) {
    $modules = $di->get('modules');
    $router = new Router();
    $adminRouterGroup = new RouterGroup();      // 管理类分组
    $adminRouterGroup->setPrefix($config->application->adminPrefix);

    $frontendRouterGroup = new RouterGroup();   //前端显示类分组
    $frontendRouterGroup->setPrefix($config->application->frontendPrefix);

//    $apiRouterGroup = new RouterGroup();        //api,service类分组
//    $apiRouterGroup->setPrefix($config->application->apiPrefix);


    $controllerPath = $config->application->controllersDir;

    // 一个路由分组的默认地址 这个路由分组里放的是显示网站数据的应用，称之为前台
    $frontendRouterGroup->add('/',[
        'namespace' => 'Modules\Frontend\Controllers',
        'module' => 'Frontend',
        'controller' => 'index',
        'action' => 'index'
    ]);

    // 一个路由分组的默认地址 这个路由分组里放的是管理网站数据的应用，称之为后台
    $adminRouterGroup->add('/',[
        'namespace' => 'Modules\Backend\Controllers',
        'module' => 'Backend',
        'controller' => 'index',
        'action' => 'index'
    ]);


    foreach ($modules as $key => $val) {
        if (file_exists($controllerPath.$val."/Router.php")) {
            require_once $controllerPath.$val."/Router.php";
        }
    }

    $router->mount($frontendRouterGroup);
    $router->mount($adminRouterGroup);
//    $router->mount($apiRouterGroup);
    return $router;
});
// 合并所有modules config数组到config对象
$di->set('config',function() use($config,$di) {
    $modules = $di->get('modules');
    $controllerPath = $config->application->controllersDir;

    foreach ($modules as $key => $val) {
        if (file_exists($controllerPath."{$val}/Config.php")) {
            $otherConf = require $controllerPath."{$val}/Config.php";
            $config->merge(new \Phalcon\Config($otherConf));
        }
    }
    return $config;
});

$di->set('url', function () use ($config) {
    $url = new UrlResolver();

    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);

/**
 * Setting up the view component
 */

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ]);
});

$di->set('language',function() use($config) {

});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});


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
