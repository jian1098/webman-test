<?php
namespace app\enum;

/**
 * http响应枚举常量
 */
class ResponseEnum
{
    //请求成功
    const SUCCESS_CODE = 200;
    const SUCCESS_MSG = '请求成功';

    //请求失败
    const ERROR_CODE = 500;
    const FAIL_MSG = '请求失败';
    const ERROR_MSG = '系统错误';

    //请求异常
    const BAD_REQUEST_CODE = 400;
    const BAD_REQUEST_MSG = '400 Bad Request';

    //未登录
    const UNAUTHORIZED_CODE = 401;
    const UNAUTHORIZED_MSG = '请先登录';

    //禁止访问
    const FORBIDDEN_CODE = 403;
    const FORBIDDEN_MSG = '403 Forbidden';

    //未找到
    const NOT_FOUND_CODE = 404;
    const NOT_FOUND_MSG = '404 Not Found';

    //方法不允许
    const METHOD_NOT_ALLOWED_CODE = 405;
    const METHOD_NOT_ALLOWED_MSG = 'Method Not Allowed';

    //请求防抖
    const REQUEST_LIMIT__DEFAULT_TIME = 5;
    const REQUEST_LIMIT_MSG = '请不要频繁操作';
}