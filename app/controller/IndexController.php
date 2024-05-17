<?php

namespace app\controller;

use app\service\TestService;
use support\Request;

class IndexController extends BaseController
{
    public function index(Request $request)
    {
        static $readme;
        if (!$readme) {
            $readme = file_get_contents(base_path('README.md'));
        }
        return $readme;
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    public function json(Request $request, TestService $testService)
    {
        $version = env_get('APP.VERSION');
        $data = [
            'version' => $version,
            'service' => $testService->test(),
        ];

//        $this->errorForbidden();
        $this->success($data);
    }

}
