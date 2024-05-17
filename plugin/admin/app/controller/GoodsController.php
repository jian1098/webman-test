<?php

namespace plugin\admin\app\controller;

use app\model\Goods;
use support\exception\BusinessException;
use support\Request;
use support\Response;
use Throwable;

/**
 * 商品信息
 */
class GoodsController extends Crud
{
    /**
     * 不需要登录的方法
     * @var string[]
     */
    protected $noNeedLogin = [];

    /**
     * 不需要鉴权的方法
     * @var string[]
     */
    protected $noNeedAuth = [];

    /**
     * @var Goods
     */
    protected $model = null;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new Goods();
    }

    /**
     * 商品列表
     * @return Response
     * @throws Throwable
     */
    public function index()
    {
        return raw_view('goods/index');
    }

    /**
     * 更新
     * @param Request $request
     * @return Response
     * @throws BusinessException|Throwable
     */
    public function update(Request $request): Response
    {
        if ($request->method() === 'POST') {
            var_dump($request->all());
            return parent::update($request);
        }
        return raw_view('goods/update');
    }
}
