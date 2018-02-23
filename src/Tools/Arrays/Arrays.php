<?php
/**
 * Created by PhpStorm.
 * User: zhaoxin
 * Date: 2018/2/23
 * Time: 10:40
 */

namespace Tools\Arrays;



use Tools\Strings\Validate;

class Arrays
{
    public $array = [];
    public function __construct($array)
    {
        if(!Validate::isArray($array)){
            return null;
        }
        $this->array = $array;
    }


    //一维数组值升序排序
    public function sortAsc(){
        sort($this->array);
    }
    //一维数组值降序排序
    public function sortDesc(){
        rsort($this->array);
    }
    //一维数组key升序排序
    public function keySortAsc(){
        ksort($this->array);
    }
    //一维数组key降序排序
    public function keySortDesc(){
        krsort($this->array);
    }

}