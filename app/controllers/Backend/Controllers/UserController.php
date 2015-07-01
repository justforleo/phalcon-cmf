<?php
namespace Modules\Frontend\Controllers;

class UserController extends \CommonController
{

    public function indexAction()
    {

    }

    public function resultAction()
    {
        $this->view->setVar('siteTitle','会员管理');
        $this->view->disable(1);
        $arr = \MagicCategory::find();
//        $arr->toArray();
        foreach ($arr->toArray() as $key => $val) {
            echo $val['category_name'];
        }
        console($arr->toArray());
    }
}
