<?php

namespace app\exception;

use Tinywan\ExceptionHandler\Exception\BaseException;

/**
 * 自定义http响应异常
 */
class HttpResponseException extends BaseException
{
    /**
     * @var int
     */
    public int $statusCode = 200;

    /**
     * @var string
     */
    public string $errorMessage = '请求成功';

    public function __construct(int $errorCode,  string $errorMessage = '', array $params = [], string $error = '')
    {
        $this->statusCode = $errorCode;
        parent::__construct($errorMessage, $params, $error);
    }


}