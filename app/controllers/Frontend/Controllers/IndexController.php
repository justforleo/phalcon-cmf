<?php
namespace Modules\Frontend\Controllers;


use Phalcon\Cli\Router\Exception;

class IndexController extends \CommonController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->tag->setTitle('首页');

        parent::initTitle();
        $this->view->setVars(['title'=>123]);
    }

}


