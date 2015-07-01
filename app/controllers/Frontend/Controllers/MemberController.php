<?php
namespace Modules\Frontend\Controllers;
class MemberController extends \CommonController
{

    public function initialize()
    {
        parent::initialize();

        if (!parent::isLogin()) {
            // do login action
            $this->response->redirect('account/login');
        }

        $this->view->setVar('menuList',[
            [
                'link' => '/member',
                'name' => '个人中心'
            ],
            [
                'link' => '/member/mark',
                'name' => 'mark'
            ],
            [
                'link' => '/member/history',
                'name' => '足迹'
            ]
        ]);
        $this->view->setTemplateBefore('memberCommon');

//        $this->view->setTemplateAfter('common');
    }

    public function indexAction()
    {
    }

    public function markAction()
    {

    }

    public function historyAction()
    {
        $this->tag->setTitle('足迹');
        parent::initTitle();
        $this->getDI()->getService('d');
    }

}

