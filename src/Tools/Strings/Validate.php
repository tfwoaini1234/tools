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

        $result = preg_match('/^(13|14|15|18|17|19)[0-9]{9}$/i', $str);
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

    /**
     * 判断是否为合法的身份证号码 true
     * @param $str
     * @return bool
     */
    public static function isIdCard($str){
        $id = strtoupper($str);
        $regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/";
        $arr_split = array();
        if(!preg_match($regx, $id))
        {
            return FALSE;
        }
        if(15==strlen($id)) //检查15位
        {
            $regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/";

            @preg_match($regx, $id, $arr_split);
            //检查生日日期是否正确
            $dtm_birth = "19".$arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4];
            if(!strtotime($dtm_birth))
            {
                return FALSE;
            } else {
                return TRUE;
            }
        }
        else      //检查18位
        {
            $regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/";
            @preg_match($regx, $id, $arr_split);
            $dtm_birth = $arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4];
            if(!strtotime($dtm_birth)) //检查生日日期是否正确
            {
                return FALSE;
            }
            else
            {
                //检验18位身份证的校验码是否正确。
                //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
                $arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
                $arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
                $sign = 0;
                for ( $i = 0; $i < 17; $i++ )
                {
                    $b = (int) $id{$i};
                    $w = $arr_int[$i];
                    $sign += $b * $w;
                }
                $n = $sign % 11;
                $val_num = $arr_ch[$n];
                if ($val_num != substr($id,17, 1))
                {
                    return FALSE;
                } //phpfensi.com
                else
                {
                    return TRUE;
                }
            }
        }
    }
}