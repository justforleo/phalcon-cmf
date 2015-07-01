<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/3/12
 * Time: 下午4:27
 */
namespace Modules\Backend\Controllers;

class CategoryController extends \CommonController
{
    public function indexAction()
    {
        $this->view->setTemplateBefore('articleCommon');
    }
    public function resultAction()
    {

//        $result = \MagicCategory::query("select category_name,category_id from magic_category");
        $result = \MagicCategory::find()->toArray();
        $this->view->setVars([
            'results'=>$result
        ]);

    }
    public function addAction()
    {
        if ($this->request->isAjax()) {
            $this->view->disable();

            $magicCategory = new \MagicCategory();
            $magicCategory->category_addtime = time();
            $magicCategory->category_disable = 0;
            $magicCategory->category_name = $_POST['name'];
            $magicCategory->category_sort = $_POST['sort'];
            $url = trim($_POST['url']);
            if (!empty($url)) {
                $magicCategory->category_url = $url;
            }
            $magicCategory->category_pid = $_POST['pid'];
            if ($magicCategory->save()) {
                echo json_encode(["type"=>"success","msg"=>1]);
            } else {
                foreach($magicCategory->getMessages() as $message ) {
                    echo $message->getMessage();
                }
            }
        }
    }
}