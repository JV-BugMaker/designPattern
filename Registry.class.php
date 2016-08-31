<?php
/**
 * Created by PhpStorm.
 * User: JV
 * Date: 16/8/31
 * Time: 下午11:59
 * 注册台设计模式  利用静态方法更方便的存取数据,管理单列模式和工厂模式创建出来的对象
 */
//不管你是通过单例模式还是工厂模式还是二者结合生成的对象，都统统给我“插到”注册树上。
//我用某个对象的时候，直接从注册树上取一下就好。这和我们使用全局变量一样的方便实用。
//而且注册树模式还为其他模式提供了一种非常好的想法。
//上一个工厂模式 准确来说是单列模式和工厂模式的结合

class Register{
    protected static $data = array();

    public static function get($key){
        return isset(self::$data[$key])?self::$data[$key]:null;
    }
    public static function set($key,$value){
        self::$data[$key] = $value;
    }
    public static function removeObject($key){
        if(array_key_exists($key,self::$data)){
            unset(self::$data[$key]);

        }
    }
}