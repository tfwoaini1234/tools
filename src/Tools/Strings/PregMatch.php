<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2017/9/9
 * Time: 23:21
 */

namespace Tools\Strings;


class PregMatch
{
    /**
     * 从字符串中匹配所有a标签中的href值
     * @param $str
     * @return array
     */
    public static function a($str)
    {
        if (!empty($str)) {
            preg_match_all('/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/i', $str, $matches);
            if (!empty($matches[2])) {
                return $matches[2];
            }
            return array();

        }
        return array();
    }

    /**
     * 从字符串中匹配img标签中的src值
     * @param $str
     * @return array
     */
    public static function img($str){
        if(!empty($str)){
            $num = preg_match_all('/<img(.*?)src="(.*?)"(.*?)\/>/i',$str,$matches);
            if(!empty($matches[2])){
                return $matches[2];
            }
            return array();
        }
        return array();
    }

}