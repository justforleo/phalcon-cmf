<?php

error_reporting(E_ALL);
try {
    function console($log='')
    {
        $out = json_encode($log);
        $console = 'console.log('.$out.');';
        echo '<script type="text/javascript">'.$console.'</script>';
    }

    require_once(__DIR__ . '/../app/library/PhpConsole/__autoload.php');
    $handler = PhpConsole\Handler::getInstance();
    $handler->start();
    define('INDEX_PATH',__DIR__);
    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";
    /**
     * Read Common Method
     */
    include $config->application->controllersDir . 'CommonController.php';
    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);


    $application->registerModules(
        $di->getRegisterModules()
    );
    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo $e->getMessage();
}
