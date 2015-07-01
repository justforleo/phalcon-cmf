<?php
namespace Modules\Backend\Controllers;


class RuleController extends \CommonController
{

    public function initialize()
    {
        parent::initialize();
        parent::initTitle();

    }

    public function indexAction()
    {
//        $this->tag->setTitle('首页');
    }

    public function resultAction()
    {

    }
    /*
     * 把组名字插入到level里
     * 把组方案插入到rule里
     * 在中间表里关联*/

    public function addAction()
    {
        if (!$this->request->isAjax()) {
            $this->view->setVar('urlData',\MagicRules::getAllUrl());
        } else {

        }
    }

}

