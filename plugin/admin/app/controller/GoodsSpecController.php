<?php

namespace plugin\admin\app\controller;

use app\model\GoodsSpec;
use support\Response;
use Throwable;

/**
 * 商品规格
 */
class GoodsSpecController extends Crud
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
     * @var GoodsSpec
     */
    protected $model = null;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->model = new GoodsSpec();
    }

    /**
     * 商品列表
     * @return Response
     * @throws Throwable
     */
    public function index()
    {
        return raw_view('goods_spec/index');
    }

}
