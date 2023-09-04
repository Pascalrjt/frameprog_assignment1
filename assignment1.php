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

class PhoneCamera extends MobilePhone {
    private $cameraMP;
    private $cameraSensor;

    public function __construct($name, $brand, $price, $stock, $os=null, $cameraMP, $cameraSensor) {
        parent::__construct($name, $brand, $price, $stock, $os=null);
        $this->cameraMP = $cameraMP;
        $this->cameraSensor = $cameraSensor;
    }

    public function getCameraMP() {
        return $this->cameraMP;
    }

    public function getCameraSensor() {
        return $this->cameraSensor;
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

// Testing
//$newPhone = new MobilePhone("Samsung Galaxy A24", "Samsung", "600", "20", "Android");
//echo $newPhone->getName();

// Create an inventory
$inventory = new Inventory();

// Adding more phones to the inventory
$phone3 = new MobilePhone("Google Pixel 5", "Google", "700", "10", "Android", "12", "IMX285");
$phone4 = new MobilePhone("OnePlus 9", "OnePlus", "750", "12", "Android", "48", "IMX765");

$inventory->addPhone($phone3);
$inventory->addPhone($phone4);

// List phones in the inventory with the new phones
$phonesInInventory = $inventory->getInventory();
echo "Phones in the inventory:\n";
foreach ($phonesInInventory as $phone) {
    echo "Name: " . $phone->getName() . ", Brand: " . $phone->getBrand() . ", Price: " . $phone->getPrice() . "\n";
}

// Delete a phone from the inventory by name
$deleted = $inventory->deletePhoneByName("iPhone 12");

if ($deleted) {
    echo "Phone deleted successfully.\n";
} else {
    echo "Phone not found in the inventory.\n";
}

// List phones in the inventory after deletion
$phonesInInventory = $inventory->getInventory();
echo "Phones in the inventory after deletion:\n";
foreach ($phonesInInventory as $phone) {
    echo "Name: " . $phone->getName() . ", Brand: " . $phone->getBrand() . ", Price: " . $phone->getPrice() . "\n";
}
