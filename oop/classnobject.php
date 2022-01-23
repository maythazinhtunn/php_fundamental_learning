<?php
class Drinks
{
    public $name='shark';
    public $price =100;
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

    public function setName($name)
    {
        $this -> name =$name;
    }

    public function getName()
    {
        echo $this-> name ."</br>";
    }
}

$somedrink = new Drinks();
$somedrink -> setName("coke");
$somedrink -> setPrice(100);
$somedrink -> getName();
$somedrink -> getPrice();
echo $somedrink -> name;
?>

