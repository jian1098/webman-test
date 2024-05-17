<?php
namespace app\middleware;

use app\enum\AuthEnum;
use ReflectionClass;
use Shopwwi\WebmanAuth\Facade\Auth;
use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

/**
 * 身份验证中间件
 */
class AuthCheck implements MiddlewareInterface
{
    use \app\traits\Response;

    public function process(Request $request, callable $handler) : Response
    {
        $user = Auth::guard(AuthEnum::DEFAULT_GUARD_USER)->user();
        if ($user) {
            // 已经登录，请求继续向洋葱芯穿越
            return $handler($request);
        }

        // 通过反射获取控制器哪些方法不需要登录
        $controller = new ReflectionClass($request->controller);
        $noNeedLogin = $controller->getDefaultProperties()['noNeedLogin'] ?? [];

        // 访问的方法需要登录
        if ($noNeedLogin !== '*' && !in_array($request->action, $noNeedLogin)) {
            // 拦截请求，返回一个重定向响应，请求停止向洋葱芯穿越
            $this->errorUnauthorized();
        }

        // 不需要登录，请求继续向洋葱芯穿越
        return $handler($request);
    }
}