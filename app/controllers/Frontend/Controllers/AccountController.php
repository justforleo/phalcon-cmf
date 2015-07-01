<?php
namespace Modules\Frontend\Controllers;
class AccountController extends \CommonController
{
    public function initialize()
    {
        parent::initialize();

        if (parent::isLogin()) {
            // do login action
//            $this->response->redirect('/');
        }
    }
    public function loginAction()
    {
        $this->tag->setTitle('login');
        parent::initTitle();

        if ($this->request->isPost()) {
            $_res = \EoMember::findFirst(["username  = '$_POST[username]'"]);
            if (!$_res->id) {
                // username error
                $this->view->setVars(['msg'=>'username error']);

            }
            $_res = \EoMember::findFirst("id = {$_res->id} and password = '".md5($_POST[passwd])."'");
            if (!$_res->id) {
                // passwd error
                $this->view->setVars(['msg'=>'passwd error']);

            }

            $this->session->set('username',$_res->username);
            $this->session->set('id',$_res->id);

//            $redirect = $this->request->getQuery('redirect');
            $this->response->redirect('member');

        }
    }

    public function regAction()
    {

        $this->tag->setTitle('reg');
        parent::initTitle();
        $_res = \EoMember::find();

        $this->view->setVar('_res',$_res);
        if ($this->request->isPost()) {
            $data = $_POST;
            $mod_member = new \EoMember();
            $mod_member->username = $data['username'];
            $mod_member->password = md5($data['passwd']);
            $mod_member->photo = 0;
            $mod_member->level = 1; // 最低1，管理员0
            $mod_member->addtime = time();
            if ($mod_member->save()) {
//                $this->display('succcess','注册成功');
            } else {
//                $this->display('succcess','注册失败');
            }
        } else {

        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('index');
    }
    public function authAction()
    {

    }

}