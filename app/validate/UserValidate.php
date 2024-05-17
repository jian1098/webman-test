<?php

namespace app\validate;


/**
 * 用户模块验证器
 */
class UserValidate extends BaseValidate
{
    //验证规则
    protected $rule = [
        'username' => 'require|length:4,30',
        'password' => 'require|length:6,50',
    ];

    //提示信息
    protected $message = [
        'username.require' => '账号不能为空',
        'username.length' => '账号长度需要在4-30个字符之间',
        'password.require' => '密码不能为空',
        'password.length' => '密码长度需要在6-30个字符之间',
    ];

    //验证场景
    protected $scene = [
        //注册
        'register' => [
            'username',
            'password'
        ],
    ];
}