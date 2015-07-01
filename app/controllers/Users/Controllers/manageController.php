<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/7/1
 * Time: 上午10:18
 */

namespace Modules\Backend\Controllers;

class manageController extends \CommonController{

    public function adminAction()
    {
        $this->view->Disable(1);
        echo 122223;
    }
}