<?php
namespace app\enum;

/**
 * 商品模块枚举常量
 */
class GoodsEnum
{
    //上架状态
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;
    const STATUS_STR = [
        self::STATUS_ENABLE => '上架',
        self::STATUS_DISABLE => '下架',
    ];


}