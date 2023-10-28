<?php
include_once('product.php');
class Furniture extends Product {
    private $length;
    private $height;
    private $width;

    public function __construct($sku, $name, $price, $typeAttr) {
        parent::__construct($sku, $name, $price); // Call parent class constructor
        $this->length = $typeAttr->length;
        $this->height = $typeAttr->height;
        $this->width = $typeAttr->width;
    }

    public function save(){
        parent::saveProduct();
        DB::insert("Furniture", [
            'ProductSKU' => $this->getSku(),
            'length' => $this->getLength(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth()
        ]);
    }

    public static function read(){
        $product = DB::query("SELECT * FROM Furniture");
        
        return $product;
    }

    public function edit(){
        parent::editProduct();
        DB::insertUpdate("Furniture", [
            'ProductSKU' => $this->getSku(),
            'length' => $this->getLength(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth()
        ]);
    }

    public function getLength() {
        return $this->length;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getWidth() {
        return $this->width;
    }
}
?>