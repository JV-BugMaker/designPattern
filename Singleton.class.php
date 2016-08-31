<?php
/**
 * Created by PhpStorm.
 * User: JV
 * Date: 16/8/31
 * Time: 下午11:23
 * 单例模式
 */

final class Single{
    private static $_instance;
    //只能通过调用静态函数 创建一个实例
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    //将能够创建对象或者复制对象的方式全部设置成私有 保护对象
    private function __construct(){

    }
    private function __clone(){

    }
}