<?php
/**
 * Created by PhpStorm.
 * User: JV
 * Date: 16/8/31
 * Time: 下午11:35
 * 工厂设计模式
 */

abstract class FactoryAbstract{
    protected static $_instances = array();
    //从调用的子类中存储到单列数组中 使得所有的子类都使用单列模式
    public static function getInstance(){
        $className = static::getClassName();
        if(!(self::$_instances[$className] instanceof $className)){
            self::$_instances[$className] = new $className();
        }
        return self::$_instances[$className];
    }
    //从调用的子类中找到这个实例 先判断 存在就删除
    public static function removeInstance(){
        $className = static ::getClassName();
        if(array_key_exists($className,self::$_instances)){
            unset(self::$_instances[$className]);
        }
    }

    protected function __construct(){}

    final protected function __clone()
    {
        // TODO: Implement __clone() method.
    }
    //子类无法重写 也就是不能被子类改写 子类只能调用
    final protected static function getClassName(){
        //用户静态方法的调用获取调用父类的子类名
        return get_called_class();
    }

}

abstract class Factory extends FactoryAbstract{
    final public static function getInstance()
    {
        return parent::getInstance(); // TODO: Change the autogenerated stub
    }
    final public static function removeInstance()
    {
        parent::removeInstance(); // TODO: Change the autogenerated stub
    }
}

class FirstProduct extends Factory {
    public $a = [];
}
class SecondProduct extends FirstProduct {
}
//obj->a[] = 1 a-->array;
FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 3;
SecondProduct::getInstance()->a[] = 4;

print_r(FirstProduct::getInstance()->a);
print_r(SecondProduct::getInstance()->a);
