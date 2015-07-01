<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/7/1
 * Time: 上午10:18
 */

namespace Modules\Users\Controllers;

class IndexController extends \CommonController{
    public function helloAction()
    {
        $this->view->Disable(1);
        echo 12123123;
    }
}