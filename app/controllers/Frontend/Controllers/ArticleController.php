<?php
namespace Modules\Frontend\Controllers;
class ArticleController extends \CommonController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->tag->setTitle('文章');
        parent::initTitle();
    }

    public function listAction()
    {
        $this->tag->setTitle('列表');
        parent::initTitle();
    }
}

