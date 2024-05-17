<?php
/**
 * Here is your custom functions.
 */

use app\enum\ResponseEnum;
use app\exception\HttpResponseException;
use support\Cache;
use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            VarDumper::dump($v);
        }

        exit(1);
    }
}

if (!function_exists('request_limit')) {
    /**
     * 请求防抖
     *
     * @param string $function_name 方法名称
     * @param string $key 缓存名称
     * @param int $time 防抖时间（秒）
     */
    function request_limit($function_name, $key, $time = ResponseEnum::REQUEST_LIMIT__DEFAULT_TIME)
    {
        $cacheKey = $function_name . '_' . $key; //缓存名称
        if (Cache::has($cacheKey)){
            $result = [
                'code' => ResponseEnum::ERROR_CODE, //只有code==200时为请求成功
                'msg'  => ResponseEnum::REQUEST_LIMIT_MSG,
                'data' => null,
            ];
            throw new HttpResponseException(ResponseEnum::ERROR_CODE, '', ['data' => $result]);
        }
        Cache::set($cacheKey, time(), $time);
    }
}
