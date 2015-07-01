<?php

class MagicCategory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $category_id;

    /**
     *
     * @var string
     */
    public $category_name;

    /**
     *
     * @var string
     */
    public $category_pid;

    /**
     *
     * @var string
     */
    public $category_sort;

    /**
     *
     * @var integer
     */
    public $category_disable;

    /**
     *
     * @var string
     */
    public $category_url;

    /**
     *
     * @var string
     */
    public $category_addtime;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'category_id' => 'category_id', 
            'category_name' => 'category_name', 
            'category_pid' => 'category_pid', 
            'category_sort' => 'category_sort', 
            'category_disable' => 'category_disable', 
            'category_url' => 'category_url', 
            'category_addtime' => 'category_addtime'
        );
    }
    public function initialize()
    {

    }


}
