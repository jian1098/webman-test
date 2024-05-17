<?php

namespace app\controller;

use app\enum\AuthEnum;
use app\validate\UserValidate;
use support\Request;
use Shopwwi\WebmanAuth\Facade\Auth;

/**
 * 用户模块
 */
class UserController extends BaseController
{
    /**
     * 不需要登录的方法
     */
    protected $noNeedLogin = ['login', 'register'];


    /**
     * 用户登录
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $params = $request->all();

        // 默认为user角色 当你是admin登入时
        $token = Auth::guard(AuthEnum::DEFAULT_GUARD_USER)->attempt(['username' => $params['username'], 'password' => $params['password']]);
        if (empty($token)) {
            $this->fail('账号或密码错误');
        }
        $this->success($token);
    }

    /**
     * 用户信息
     *
     * @param Request $request
     * @return void
     */
    public function info(Request $request)
    {
        $user = Auth::guard(AuthEnum::DEFAULT_GUARD_USER)->user(true); //显示字段在config/plugin/shopwwi/auth/app.php:19中配置
        $user->user_id = $this->userId;
        $this->success($user);
    }

    /**
     * 退出登录
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::guard(AuthEnum::DEFAULT_GUARD_USER)->logout(true); // 退出所有当前用户终端
        $this->ok('退出成功');
    }

    /**
     * 用户注册
     *
     * @param Request $request
     * @param UserValidate $validate
     * @return void
     */
    public function register(Request $request, UserValidate $validate)
    {
        //参数验证
        $params = $validate->verify(__FUNCTION__, $request->post());


        $this->success($params, '注册成功');
    }
}
