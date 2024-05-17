<?php

namespace app\controller;

use app\service\GoodsService;
use support\Request;

class GoodsController extends BaseController
{
    protected $service; //商品服务

    public function __construct(GoodsService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * 商品列表
     * @param Request $request
     * @return void
     */
    public function list(Request $request)
    {
        $list = $this->userId;
//        request_limit(__FUNCTION__, $this->userId, 5);

//        $list = $this->service->getGoodsList();
        $this->success($list);
    }
}
