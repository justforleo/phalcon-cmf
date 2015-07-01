<?php
namespace Modules\Frontend\Controllers;
class SearchController extends \CommonController
{

    public function initialize()
    {
        parent::initialize();
        $this->tag->setTitle($_POST['search'].' 搜索结果');
        parent::initTitle();

    }

    public function onConstruct()
    {

    }
    public function indexAction()
    {
        $searchRes = [];
        $postData = $this->request->getPost();

        if ($this->request->isPost() && isset($postData['search']) && !empty($postData['search'])) {
            $searchData = $postData['search'];
            $searchRes = \EoDoc::find("title like '%$searchData%'");
            // 是post就显示取的数据
        } else {
            // 如果不是post就取一些随机或者新的数据
            $searchRes = \EoMemberHistory::find('type = 2');
        }
        $this->view->setVars([
            'searchRes' => $searchRes
        ]);
    }

}

