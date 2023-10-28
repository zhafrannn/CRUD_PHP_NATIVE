<?php
include_once('product.php');
class Dvd extends Product {
    protected $size;

    public function __construct($sku, $name, $price, $typeAttr) {
        parent::__construct($sku, $name, $price); // Call parent class constructor
        $this->size = $typeAttr->size;
    }

    public function save(){
        parent::saveProduct();
        DB::insert("Dvd", [
            'ProductSKU' => $this->getSku(),
            'Size' => $this->getSize()
        ]);
    }

    public static function read(){
        parent::readProduct();
        // $product = DB::query(
        //     "SELECT * FROM Product 
        //     ON Product.SKU = Dvd.productSKU
        //     WHERE Product.SKU = %s AND Product.Name = %s AND Product.Price AND Dvd.Size",
        //     $this->sku, $this->name, $this->price, $this->getSize());
        $product = DB::query("SELECT * FROM Dvd");

        return $product;
    }

    public function edit(){
        parent::editProduct();
        DB::insertUpdate("DVD-Disk", [
            'ProductSKU' => $this->getSku(),
            'Size' => $this->getSize()
        ]);
    }

    public function setSize($typeAttr) {
        $this->size = $typeAttr->size;
    }

    public function getSize() {
        return $this->size;
    }
}
?>