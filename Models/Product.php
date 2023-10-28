<?php
class Product {
    protected $sku;
    protected $name;
    protected $price;
    // protected $table = Product;

    public function __construct($sku, $name = "", $price = 0) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public static function readProduct(){
        // DB::query(
        //     "SELECT * FROM Product 
        //     ON Product.SKU = Dvd.productSKU
        //     WHERE Product.SKU = %s AND Product.Name = %s AND Product.Price AND Dvd.Size", $this->sku, $name, $price, $size);
        // $products = [];
            DB::query("SELECT * FROM product");
    }

    public function saveProduct(){
        // echo json_encode("Success");
        
        DB::insert("Product", [
            'SKU' => $this->getSku(),
            'Name' => $this->getName(),
            'Price' => $this->getPrice()
        ]);
    }

    public function editProduct(){
        DB::insertUpdate("product", [
            'SKU' => $this->getSku(),
            'Name' => $this->getName(),
            'Price' => $this->getPrice()
        ]);
    }

    public function deleteProduct(){
        DB::delete("Product", 'SKU=%s', $this->getSku());
    }

    public function getSku() {
        return $this->sku;  
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}
?>