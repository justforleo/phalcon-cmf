<?php
//namespace Modules\Common\Controllers;
class CommonController extends \Phalcon\Mvc\Controller
{
    static $uid = 0;

    public function initialize()
    {
        if ( (self::$uid = $this->session->get('id')) != 0 ) {
            $this->view->setVar('username',$this->session->get('username'));
        }
        $this->view->setVar('uid',self::$uid);
    }

    public function initTitle()
    {
        $titleResult = [
            'rule' => [
                'index' => '权限管理',
                'Result' => '权限管理',
                'add' => '添加权限',
                'edit' => '修改权限'
            ]
        ];
        $controllerName = $this->router->getCOntrollerName();
        if (isset($titleResult[$controllerName]) && !!sizeof($titleResult[$controllerName])) {
            $res = $titleResult[$controllerName];
            if ($res && isset($res[$this->router->getActionName()])) {
                $this->tag->setTitle($res[$this->router->getActionName()]);
            } else {

            }
        }


        $this->tag->setTitleSeparator(' | ');
        // 这里可以从数据库读取
        if ($this->router->getModuleName() == 'Backend'){
            $this->tag->prependTitle('后台管理');
        } else {
          $this->tag->prependTitle('前台管理');
        }

    }

    public function isLogin()
    {
        return self::$uid;
    }

}
