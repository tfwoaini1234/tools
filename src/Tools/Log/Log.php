<?php
namespace Tools\Log;
/**
 * Created by PhpStorm.
 * User: hd
 * Date: 2018/11/10
 * Time: 16:20
 */
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    //警告日志方法
    public static function warning($msg){
        $msg = strval($msg);
        $log = new Logger('Log');
        $day = date('Y-m-d');
        $log->pushHandler(new StreamHandler('log/'.$day.'/warning.log', Logger::WARNING));
        $log->warning($msg);
    }

    //提示日志方法
    public static function notice($msg){
        $msg = strval($msg);
        $log = new Logger('Log');
        $day = date('Y-m-d');
        $log->pushHandler(new StreamHandler('log/'.$day.'/notice.log', Logger::WARNING));
        $log->notice($msg);
    }

    //错误日志方法
    public static function error($msg){
        $msg = strval($msg);
        $log = new Logger('Log');
        $day = date('Y-m-d');
        $log->pushHandler(new StreamHandler('log/'.$day.'/error.log', Logger::WARNING));
        $log->error($msg);
    }
}