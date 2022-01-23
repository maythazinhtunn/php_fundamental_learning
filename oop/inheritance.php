<?php

use Drinks as GlobalDrinks;
use JetBrains\PhpStorm\Deprecated;

class Drinks
{
    public $name='shark';
    public $price =100;
    
    public function setName($name)
    {
        $this -> name =$name;
    }

    public function getName()
    {
        echo $this-> name ."</br>";
    }

    public function __construct()
    {
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    public function getPrice()
    {
        echo $this -> price ."</br>";
    }
}
class Juice extends Drinks //inheritance
{
}
$juice=new Juice();
$juice->setName("Orange Juice");
$juice->getName();
$juice->setPrice(300);
$juice->getPrice();
