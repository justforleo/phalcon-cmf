<?php

class MagicRules extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $role_id;

    /**
     *
     * @var string
     */
    public $role_uri;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'role_id' => 'role_id', 
            'role_uri' => 'role_uri'
        );
    }
    /*
     * 从url表里， 获取程序里modules以为里面的controller和action
     * @return array
     * */
    static public function getAllUrl()
    {

    }

}
