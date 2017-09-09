<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2017/9/8
 * Time: 16:55
 */

namespace Tools\Audio;




use getID3;

class Music
{
    public $error;
    private $fileInfo;
    public function doc(){
        echo "处理音频文件";
    }

    /**
     * @param $file_path
     * @return $this
     */
    public function open($file_path){
        if(empty($file_path)){
            $this->error = "音频路径不能为空！";
            return $this;
        }
        $getID3 = new getID3;
        $ThisFileInfo = $getID3->analyze($file_path);
        if(!empty($ThisFileInfo['error'][0])){
            $this->error = $ThisFileInfo['error'][0];
            return $this;
        }
        $this->fileInfo = $ThisFileInfo;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime(){
        return empty($this->fileInfo['playtime_seconds'])?0:$this->fileInfo['playtime_seconds'];
    }
    public function test(){
        $getID3 = new getID3();
        $ThisFileInfo = $getID3->analyze("demo.mp3");

        unset($ThisFileInfo['comments']['picture'][0]['data']);
        //var_dump($ThisFileInfo);
        var_dump($ThisFileInfo);
        exit;
        var_dump($ThisFileInfo['id3v2']);
        //音频标题数据
//        $header = $ThisFileInfo['id3v2']['APIC'];
//        //获取头像
//        $myfile = fopen("demo.jpg", "w") or die("Unable to open file!");
//        fwrite($myfile, $ThisFileInfo['id3v2']['APIC'][0]['data']);
//        fclose($myfile);
    }



}