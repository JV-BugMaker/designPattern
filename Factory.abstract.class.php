<?php
/**
 * Created by PhpStorm.
 * User: JV
 * Date: 16/9/3
 * Time: 下午9:18
 * 工厂设计模式 抽象工厂
 */
//有些情况下我们需要根据不同的选择逻辑提供不同的构造工厂，而对于多个工厂而言需要一个统一的抽象工厂：
class Config{
    public static $factory = 1;
}

interface Product {
    public function getName();
}

abstract class  AbstractFactory {
    public static function getFactory(){
        switch (Config::$factory){
            case 1:
                return new FirstFactory();
                break;
            case 2:
                return new SecondFactory();
                break;
            default:
                break;
        }
    }
    abstract public function getProduct();
}

class FirstFactory extends AbstractFactory{
    public function getProduct()
    {
        return new FirstProduct();
        // TODO: Implement getProduct() method.
    }
}
class FirstProduct implements Product{
    public function getName()
    {
        return "first product";
        // TODO: Implement getProduct() method.
    }
}
class SecondFactory extends AbstractFactory{
    public function getProduct()
    {
        return new SecondProduct();
        // TODO: Implement getProduct() method.
    }
}
class SecondProduct implements Product{
    public function getName()
    {
        return "second product";
        // TODO: Implement getProduct() method.
    }
}
$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

print_r($firstProduct->getName());
// The first product from the first factory
print_r($secondProduct->getName());
// Second product from second factory