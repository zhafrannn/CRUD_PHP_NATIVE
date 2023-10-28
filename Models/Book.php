<?php
include_once('product.php');
class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $typeAttr) {
        parent::__construct($sku, $name, $price); // Call parent class constructor
        $this->weight = $typeAttr->weight;
    }
    public function save(){
        parent::saveProduct();
        DB::insert("Book", [
            'ProductSKU' => $this->getSku(),
            'Weight' => $this->getWeight()
        ]);
    }

    public static function read(){
        parent::readProduct();
         $product = DB::query("SELECT * FROM Book");
    }

    public function edit(){
        parent::editProduct();
        DB::insertUpdate("Book", [
            'ProductSKU' => $this->getSku(),
            'Weight' => $this->getWeight()
        ]);
    }

    public function getWeight() {
        return $this->weight;
    }
}
?>