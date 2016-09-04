<?php
/**
 * Created by PhpStorm.
 * User: JV
 * Date: 16/9/3
 * Time: 下午9:16
 * 工厂模式  最常见的
 */
//##################华丽丽的分割线######################

interface Factory{
    public function getProduct();
}
interface Product{
    public function getName();
}

class FirstFactory implements Factory{
    public function getProduct()
    {
        return new FirstProduct();
        // TODO: Implement getProduct() method.
    }
}

class SecondFactory implements Factory{
    public function getProduct()
    {
        return new SecondProduct();
        // TODO: Implement getProduct() method.
    }
}

class FirstProduct implements Product{
    public function getName()
    {
        echo "First product";
        // TODO: Implement getName() method.
    }
}
class SecondProduct implements Product{
    public function getName()
    {
        echo "Second product";
        // TODO: Implement getName() method.
    }
}