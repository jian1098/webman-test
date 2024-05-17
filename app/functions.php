<?php
/**
 * Here is your custom functions.
 */

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
    function request_limit($function_name, $key, $time = 5)
    {
        $cacheKey = $function_name . '_' . $key; //缓存名称
        if (Cache::has($cacheKey)){
            $result = [
                'code' => 500, //只有code==200时为请求成功
                'msg'  => '请不要频繁操作',
                'data' => null,
            ];
            throw new HttpResponseException(500, '', ['data' => $result]);
        }
        Cache::set($cacheKey, time(), $time);
    }
}
