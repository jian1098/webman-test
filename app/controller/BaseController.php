<?php

namespace app\controller;

use app\enum\AuthEnum;
use app\traits\Response;
use Shopwwi\WebmanAuth\Facade\Auth;

/**
 * 基类控制器
 */
class BaseController
{
    //使用统一响应
    use Response;

    //登录用户信息
    protected $userId = null;

    /**
     * 构造函数
     */
    public function __construct()
    {
        //用户信息
        $user = Auth::guard(AuthEnum::DEFAULT_GUARD_USER)->user();
        if ($user){
            $this->userId = $user->id;
        }
    }
}