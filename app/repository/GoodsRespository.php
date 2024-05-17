<?php

namespace app\repository;

use app\enum\CommonEnum;
use app\enum\GoodsEnum;
use app\model\Goods;

/**
 * 商品仓库
 */
class GoodsRespository extends Repository
{
    public function __construct(Goods $model)
    {
        $this->model = $model;
    }

    /**
     * 获取商品列表
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getGoodsList()
    {
        return $this->model
            ->where('status', GoodsEnum::STATUS_ENABLE)
            ->paginate(CommonEnum::PER_PAGE);
    }
}