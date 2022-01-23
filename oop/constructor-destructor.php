<?php
class Drinks
{
    public function __construct($name, $price)
    {
        $this->name=$name;
        $this->price=$price;
    }
    public function __destruct()
    {
        echo 'destruct';
    }
    public function getPrice()
    {
        echo $this -> price ."</br>";
    }

    public function getName()
    {
        echo $this-> name ."</br>";
    }
}

$somedrink = new Drinks("coke", 100);
$somedrink -> getPrice();
$somedrink -> getName();
?>

