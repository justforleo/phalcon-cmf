<?php

class MagicUsers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $user_username;

    /**
     *
     * @var string
     */
    public $user_password;

    /**
     *
     * @var string
     */
    public $user_mail;

    /**
     *
     * @var string
     */
    public $user_realname;

    /**
     *
     * @var string
     */
    public $user_telphone;

    /**
     *
     * @var integer
     */
    public $user_sex;

    /**
     *
     * @var string
     */
    public $user_nickname;

    /**
     *
     * @var string
     */
    public $user_idcard;

    /**
     *
     * @var integer
     */
    public $user_disable;

    /**
     *
     * @var string
     */
    public $user_addtime;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'user_id' => 'user_id', 
            'user_username' => 'user_username', 
            'user_password' => 'user_password', 
            'user_mail' => 'user_mail', 
            'user_realname' => 'user_realname', 
            'user_telphone' => 'user_telphone', 
            'user_sex' => 'user_sex', 
            'user_nickname' => 'user_nickname', 
            'user_idcard' => 'user_idcard', 
            'user_disable' => 'user_disable', 
            'user_addtime' => 'user_addtime'
        );
    }

}
