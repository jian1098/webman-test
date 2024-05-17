<?php

namespace app\validate;

use app\traits\Response;
use think\Validate;

/**
 * 验证器基类
 */
class BaseValidate extends Validate
{
    use Response; //使用统一响应

    //验证规则
    protected $rule = [

    ];

    //提示信息
    protected $message = [

    ];

    //验证场景
    protected $scene = [

    ];

    /**
     * 执行验证
     * @param string $scene 验证场景
     * @param array $data 请求参数
     * @return array
     */
    public function verify(string $scene, array $data){
        if (!isset($this->scene[$scene])){
            $this->error('验证场景[' . $scene . ']不存在');
        }
        $res = $this->scene($scene)->check($data);
        if (!$res){
            $this->error($this->getError());
        }

        return $data;
    }
}