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

    // Getter and setter for name
    public function setName($newName){
        if(!is_string($newName)){
            throw new InvalidArgumentException("Name must be a string");    
        }

        $this->name = $newName;
    }

    public function getName(){
        return $this->name;    
    }

    // Getter and setter for brand
    public function getBrand(){
        return $this->brand;
    }

    public function setBrand($newBrand){
        $this->brand = $newBrand;
    }

    // Getter and setter for price
    public function getPrice(){
        return $this->price;
    }

    public function setPrice($newPrice){
        $this->price = $newPrice;
    }

    // Getter and setter for stock
    public function getStock(){
        return $this->stock;
    }

    public function setStock($newStock){
        $this->stock = $newStock;
    }

    // Getter and setter for os
    public function getOs(){
        return $this->os;
    }

    public function setOs($newOs){
        $this->os = $newOs;
    }
}

class Inventory {
    private $phones = []; // An array to store phone objects

    // Add a phone to the inventory
    public function addPhone(MobilePhone $phone){
        $this->phones[] = $phone;
    }

    // Delete a phone from the inventory by name
    public function deletePhoneByName($name){
        foreach ($this->phones as $key => $phone) {
            if ($phone->getName() === $name) {
                unset($this->phones[$key]);
                $this->phones = array_values($this->phones);
                return true; // Phone deleted successfully
            }
        }
        return false; // Phone with the given name not found
    }

    // Get the list of phones in the inventory
    public function getInventory(){
        return $this->phones;
    }
}

$newPhone = new MobilePhone("Samsung Galaxy A24", "Samsung", "600", "20", "Android");
echo $newPhone->getName();
