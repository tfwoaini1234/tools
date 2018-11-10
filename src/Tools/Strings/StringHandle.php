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
     * @returns {string}
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






}