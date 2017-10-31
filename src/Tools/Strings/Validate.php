<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2017/9/11
 * Time: 9:51
 * 验证类
 */

namespace Tools\Strings;


class Validate
{
    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为字符类型，字符类型为true
     * @返回类型 bool
     */
    public static function isString($val)
    {
        if (is_string($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为对象类型，对象类型为true
     * @返回类型 bool
     */
    public static function isObject($val)
    {
        try{
            if (is_object($val)) {
                return true;
            } else {
                return false;
            }
        }catch(\Exception $e){
            return false;
        }

    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为数组类型，数组类型为true
     * @返回类型 bool
     */
    public static function isArray($val)
    {
        if (is_array($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为布尔类型，布尔类型为true
     * @返回类型 bool
     */
    public static function isBool($val)
    {
        if (is_bool($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为空，空为true
     * @返回类型 bool
     */
    public static function isNull($val)
    {
        if (is_null($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为数字类型，数字类型为true
     * @返回类型 bool
     */
    public static function isInt($val)
    {
        if (is_int($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为浮点类型，浮点类型为true
     * @返回类型 bool
     */
    public static function isFloat($val)
    {
        if (is_float($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为资源类型，资源类型为true
     * @返回类型 bool
     */
    public static function isResource($val)
    {
        if (is_resource($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为标量类型标量类型为true
     * 标量变量是指那些包含了 integer、float、string 或 boolean的变量，而 array、object 和 resource 则不是标量。
     * @返回类型 bool
     */
    public static function isScalar($val)
    {
        if (is_scalar($val)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为邮件，正确返回true
     * @返回类型 bool
     */
    public static function isMail($str)
    {

        $result = preg_match('/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/i', $str);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为手机号码，正确返回true
     * @返回类型 bool
     */
    public static function isMobile($str)
    {

        $result = preg_match('/^(13|14|15|18|17)[0-9]{9}$/i', $str);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @创建人：赵心
     * @功能描述 ：判断是否为合法的ipv4格式。true
     * @返回类型 bool
     */
    public static function isIp($str)
    {

        $result = preg_match('/^(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)\.(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)\.(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)\.(25[0-5]|2[0-4]\d|[0-1]\d{2}|[1-9]?\d)$/i', $str);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}