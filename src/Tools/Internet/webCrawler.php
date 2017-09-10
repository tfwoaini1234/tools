<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2017/9/9
 * Time: 16:15
 * 网络爬虫类
 */

namespace Tools\Internet;


use Exception;
use Tools\Strings\PregMatch;

class webCrawler
{
    public function test($url){
        try{
            //判断当前页是否抓取过
            $txt = file_get_contents('urlList.txt');
            if(stripos($txt,$url) !==false){
                return false;
            }

            $html = file_get_contents($url);
            if(!empty($html)){
                $hrefs = PregMatch::a($html);

                $imgs = PregMatch::img($html);

                //保存当前页面的图片
                if(!empty($imgs)){
                    foreach($imgs as $k=>$v){
                        $content = file_get_contents($v);
                        if(!empty($content)){
                            $ext=strrchr($v,'.');
//                            if($ext!='.gif'&&$ext!='.jpg'){
//                                return array('file_name'=>'','save_path'=>'','error'=>3);
//                            }
                            $filename=time().rand(11111,99999).$ext;
                            file_put_contents($filename, $content);
                        }

                    }
                }

                if(!empty($hrefs)){
                    foreach($hrefs as $k=>$v){
                        //写入该url到txt中
                        //var_dump($v);
                        $this->test($v);
                        file_put_contents('urlList.txt',$v."\r\n",FILE_APPEND);


                    }
                }

            }
        }catch(Exception $e){
            echo 'error';
        }

    }
}