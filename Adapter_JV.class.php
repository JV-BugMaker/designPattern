<?
/*
*php 设计模式之适配器模型
*/

interface Target{
    public function getContent();
    public function export();
}

/*
*
*导出xml格式
*/
class ExportToXML implements Target{
    protected $_arr ;
    public function __construct($arr){
        $this->_arr = $arr;
    }
    public function getContent(){
        return $this->_arr;
    }
    public function export(){
        $str = "<?xml version='1.0' encoding='UTF-8'?>\r\n";
        $str .= "<root>\r\n";
        foreach($this->_arr as $key =>$value){
            $str .="<{$key}>".$value."</{$key}>\r\n";
        }
        $str .="</root>";
        echo $str;
    }
}
/*
* 现在需要导出json 
*/
class Adapter extends ExportToXML{
    public function __construct($arr){
        parent::__construct($arr);        
    }
    public function export(){
        $str = json_encode($this->_arr);
        echo $str;
    }
}

//测试
$xml = new ExportToXML(array('name'=>'jv','age'=>23));
$xml->export();
$json = new Adapter(array('name'=>'jv','age'=>23));
$json->export();