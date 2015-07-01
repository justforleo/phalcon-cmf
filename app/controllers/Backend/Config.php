<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 15/6/25
 * Time: 下午5:06
 */
/*
 * return [
 *     moduleName => [
 *         'key' => value
 *     ]
 * ]
 *
 * */
return [
    'Backend' => [
        'chinese' =>  [
            'AdminMenu' =>
                [
                    'link' => '/admin/article',
                    'name' => '文章'
                ],
                [
                    'link' => '/admin/manage',
                    'name' => '管理'
                ],
                [
                    'link' => '/admin/account/logout',
                    'name' => '退出'
                ]
        ],
    ]
];
