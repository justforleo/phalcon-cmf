<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/3/12
 * Time: 下午4:27
 */
namespace Modules\Backend\Controllers;

class IndexController extends \CommonController
{
    public function indexAction()
    {
        $this->view->setVar('menuList',[
        ]);
    }
}