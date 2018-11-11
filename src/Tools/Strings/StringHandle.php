<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2017/9/8
 * Time: 14:47
 */
namespace Tools\Strings;
use Tools\Log\Log;

class StringHandle
{
    public static function doc(){
        echo "此类主要对字符串格式等处理";
    }
    /**
     * randomWord 产生任意长度随机字母数字组合
     * @param $randomFlag 是否任意长度min-任意长度最小位[固定位数] max-任意长度最大位
     * @param $min
     * @param $max
     * @returns String
     */
    public static function createRoundStr($randomFlag,$min=1,$max=10)
    {
        try {
            $str = "";
            $range = $min;
            $arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            // 随机产生
            if ($randomFlag) {
                $range = mt_rand($min, $max);
            }
            for ($i = 0; $i < $range; $i++) {
                shuffle($arr);
                $str .= $arr[$i];
            }
            return $str;
        } catch (\Exception $e) {
            Log::warning($e->getTraceAsString());
            return null;

        }
    }

    /**
     * createUUID 创建UUID
     * @returns String $uuid  返回字符串
     */
    public static function createUUID()
    {
        $str = mt_rand(1, 2) == 1 ? md5(mt_rand(1, 2) == 1 ? md5(md5(uniqid(mt_rand(), true))) : md5(uniqid(mt_rand(), true))) : mt_rand(1, 2) == 1 ? md5(md5(uniqid(mt_rand(), true))) : md5(uniqid(mt_rand(), true));
        $uuid = substr($str, 0, 8) . '-';
        $uuid .= substr($str, 8, 4) . '-';
        $uuid .= substr($str, 12, 4) . '-';
        $uuid .= substr($str, 16, 4) . '-';
        $uuid .= substr($str, 20, 12);
        return $uuid;
    }

    /**
     * 格式化金额
     * @param $price float 金额
     * @param $type boolean 类型
     * @return string
     */
    public static function priceFormat($price,$type){
        if($type){
            return number_format($price,2);
        }else{
            return number_format($price);
        }
    }

    /**
     * 检查字符串是否在另一个字符串开头
     * @param $find string 查找的字符串
     * @param $str string 被查找的字符串
     * @param $type boolean true需要验证大小写，false不需要
     * @return bool
     */
    public static function checkStartWith($find,$str,$type=false){
        if($type){
            $res = stripos($str,$find);
        }else{
            $res = strpos($str,$find);
        }
        return $res ===0?true:false;
    }

    /**
     * 检查字符串是否在另一个字符串结尾
     * @param $find string 查找的字符串
     * @param $str string 被查找的字符串
     * @param $type boolean true需要验证大小写，false不需要
     * @return bool
     */
    public static function checkEndWith($find,$str,$type=false){
        $len = strlen($find);
        $str = substr($str,-$len);
        if(!$type){
            $find = strtolower($find);
            $str = strtolower($str);
        }
        return $find ===$str?true:false;
    }

    public static function NumToCNMoney($num){
        $c1 = "零壹贰叁肆伍陆柒捌玖";
        $c2 = "分角元拾佰仟万拾佰仟亿";
        //精确到分后面就不要了，所以只留两个小数位
        $num = round($num, 2);
        //将数字转化为整数
        $num = $num * 100;
        if (strlen($num) > 10) {
            return "不支持亿以上转换";
        }
        $i = 0;
        $c = "";
        while (1) {
            if ($i == 0) {
                //获取最后一位数字
                $n = substr($num, strlen($num)-1, 1);
            } else {
                $n = $num % 10;
            }
            //每次将最后一位数字转化为中文
            $p1 = substr($c1, 3 * $n, 3);
            $p2 = substr($c2, 3 * $i, 3);
            if ($n != '0' || ($n == '0' && ($p2 == '亿' || $p2 == '万' || $p2 == '元'))) {
                $c = $p1 . $p2 . $c;
            } else {
                $c = $p1 . $c;
            }
            $i = $i + 1;
            //去掉数字最后一位了
            $num = $num / 10;
            $num = (int)$num;
            //结束循环
            if ($num == 0) {
                break;
            }
        }
        $j = 0;
        $slen = strlen($c);
        while ($j < $slen) {
            //utf8一个汉字相当3个字符
            $m = substr($c, $j, 6);
            //处理数字中很多0的情况,每次循环去掉一个汉字“零”
            if ($m == '零元' || $m == '零万' || $m == '零亿' || $m == '零零') {
                $left = substr($c, 0, $j);
                $right = substr($c, $j + 3);
                $c = $left . $right;
                $j = $j-3;
                $slen = $slen-3;
            }
            $j = $j + 3;
        }
        //这个是为了去掉类似23.0中最后一个“零”字
        if (substr($c, strlen($c)-3, 3) == '零') {
            $c = substr($c, 0, strlen($c)-3);
        }
        //将处理的汉字加上“整”
        if (empty($c)) {
            return "零元整";
        }else{
            return $c . "整";
        }
    }



}