<?php
/**
 * Created by PhpStorm.
 * User: zxcho
 * Date: 2018/6/26
 * Time: 15:26
 */
namespace Tools\Image;

use chillerlan\QRCode\QRCode;

class QR
{
    /**
     * @param $str
     * @return $base64
     */
    public static function getQRCode($str){
        return (new QRCode())->render($str);
    }
}