<?php

namespace support;

use Tinywan\ExceptionHandler\Handler;
use Webman\Http\Request;
use Webman\Http\Response;
use Throwable;

class ErrorHandler extends Handler
{
    /**
     * 自定义ErrorHandler
     *
     * @inheritDoc
     */
    protected function buildResponse(): Response
    {
        $header = array_merge(['Content-Type' => 'application/json;charset=utf-8'], $this->header);
        return new Response($this->statusCode, $header, json_encode($this->responseData));
    }

    /**
     * 自定义Response格式
     *
     * @param Request $request
     * @param Throwable $exception
     * @return Response
     */
    public function render(Request $request, Throwable $exception): Response
    {
        $this->config = array_merge($this->config, config('plugin.tinywan.exception-handler.app.exception_handler', []) ?? []);
        $this->solveAllException($exception);
        return $this->buildResponse();
    }
}