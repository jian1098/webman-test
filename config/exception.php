<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

return [
//    '' => support\exception\Handler::class, //默认错误处理
//    '' => \Tinywan\ExceptionHandler\Handler::class, //Exception 异常插件
    '' => support\ErrorHandler::class, //自定义错误处理
];