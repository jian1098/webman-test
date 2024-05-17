<?php

namespace app\traits;

use app\exception\HttpResponseException;

trait Response{
    /**
     * 操作成功返回的数据.
     *
     * @param mixed  $data   要返回的数据
     * @param string $msg    提示信息
     * @param int    $code   错误码，默认为1
     * @param array  $header 发送的 Header 信息
     */
    protected function success($data = null, $msg = '请求成功', $code = 200, array $header = [])
    {
        $this->result($msg, $data, $code, $header, 1);
    }

    /**
     * 操作成功返回默认message
     *
     * @param string $msg    提示信息
     */
    protected function ok($msg = '请求成功')
    {
        $this->result($msg,null, 200);
    }

    /**
     * 操作失败返回的数据.
     *
     * @param string $msg    提示信息
     * @param mixed  $data   要返回的数据
     * @param int    $code   错误码，默认为0
     * @param array  $header 发送的 Header 信息
     */
    protected function fail($msg = '请求失败', $data = null, $code = 500, array $header = [])
    {
        $this->result($msg, $data, $code, $header, 0);
    }

    /**
     * 系统异常返回的数据.
     *
     * @param string $msg    提示信息
     * @param mixed  $data   要返回的数据
     * @param int    $code   错误码，默认为0
     * @param array  $header 发送的 Header 信息
     */
    protected function error($msg = '系统异常', $data = null, $code = 500, array $header = [])
    {
        $this->result($msg, $data, $code, $header, 0);
    }

    /**
     * BadRequest
     *
     */
    protected function errorBadRequest()
    {
        $this->result('400 Bad Request',null, 400, [], 0);
    }

    /**
     * Unauthorized
     *
     */
    protected function errorUnauthorized()
    {
        $this->result('请先登录',null, 401, [], 0);
    }

    /**
     * Forbidden
     *
     */
    protected function errorForbidden()
    {
        $this->result('403 Forbidden',null, 403, [], 0);
    }

    /**
     * 404 Not Found
     *
     */
    protected function errorNotFound()
    {
        $this->result('404 Not Found',null, 404, [], 0);
    }

    /**
     * Method Not Allowed
     *
     */
    protected function errorMethodNotAllowed()
    {
        $this->result('Method Not Allowed',null, 405, [], 0);
    }

    /**
     * 返回封装后的 API 数据到客户端.
     *
     * @param mixed  $msg    提示信息
     * @param mixed  $data   要返回的数据
     * @param int    $code   错误码，默认为0
     * @param array  $header 发送的 Header 信息
     *
     * @return void
     */
    protected function result($msg, $data = null, $code = 200, array $header = [], $status = 1)
    {
        $result = [
            'code' => $code, //只有code==200时为请求成功
//            'status' => $status, // 状态 1:success 0:fail、error
            'msg'  => $msg,
            'data' => $data,
        ];

        throw new HttpResponseException($code, $msg, ['data' => $result]);
    }
}
