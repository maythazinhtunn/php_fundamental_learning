<?php
class Drink
{
    const constant1="constant variable";
    public function printConstant()
    {
        echo self::constant1;
    }

    public static $staticVar = 'static variable';
    public static function staticFunction()
    {
        echo "static function";
    }
}
$obj = new Drink();
$obj -> printConstant();//for default value
echo Drink::constant1;
echo Drink::$staticVar;//static variable
echo Drink::staticFunction();//static function
