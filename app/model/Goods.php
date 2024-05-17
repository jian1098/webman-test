<?php

namespace app\model;

use app\enum\GoodsEnum;
use Illuminate\Database\Eloquent\SoftDeletes;
use support\Model;

/**
 * wa_goods 商品信息表
 * @property integer $id 商品id(主键)
 * @property string $goods_name 商品名称
 * @property string $goods_img 商品图片
 * @property integer $status 上架状态 1.上架 0.下架
 * @property mixed $desciption 商品介绍
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class Goods extends Model
{
    // 软删除
    use SoftDeletes;

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'mysql';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * 格式化时间
     * @param \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * 本地图片自动加域名
     *
     * @param $value
     * @return string
     */
    public function getGoodsImgAttribute($value)
    {
        if (empty($value) || str_contains($value, 'http://') || str_contains($value, 'https://')){
            return $value;
        }
        return env_get('APP.DOMAIN') . $value;
    }

    /**
     * 商品规格
     * @return void
     */
    public function goodsDesc()
    {
        $this->hasMany(GoodsSpec::class, 'goods_id', 'id');
    }

}
