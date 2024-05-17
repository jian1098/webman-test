<?php

namespace app\service;

use app\repository\GoodsRespository;

/**
 * 商品服务
 */
class GoodsService extends BaseService
{
    protected $repository;

    public function __construct(GoodsRespository $repository)
    {
        $this->repository = $repository;
    }

    // 商品列表
    public function getGoodsList()
    {
        $list = $this->repository->getGoodsList();
        return $list;
    }
}