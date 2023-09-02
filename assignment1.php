<?php

abstract class Device {
    abstract public function Hello();
}

interface Thing {
    
}

class MobilePhone implements Thing {
    private $name;
    private $brand;
    private $price;
    private $stock;
    private $os;

    public function __construct($name, $brand, $price, $stock, $os=null){
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->stock = $stock;
        $this->os = $os;
    }

    public function setName($newName){
        if(!is_string($newName)){
            throw new InvalidArgumentException("Name must be a string");    
        }

        $this->name = $newName;
    }

    public function getName(){
        return $this->name;    
    }
}

$newPhone = new MobilePhone("Samsung Galaxy A24", "Samsung", "600", "20", "Android");
echo $newPhone->getName();
