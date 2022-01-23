<?php
class myClass
{
    private $priData;
    protected $proData;
    public $pubData;

    public function publicFunctionName()
    {
        # code...
        return("public function");
    }

    protected function protectedFunctionName()
    {
        # code...
        return("Can access only from this class and its child class");
    }
 
    private function privateFunctionName()
    {
        # code...
        return("can access only this class");
    }
}
$obj=new myClass();
echo $obj -> pubData ='public Data';
// echo $obj -> proData ='protected Data';//cannot access protected data
// echo $obj -> priData ='private Data'; cannot access pirvate data
var_dump($obj-> publicFunctionName());
// var_dump($obj-> protectedFunctionName());//uncaught error
// var_dump($obj-> privateFunctionName());
