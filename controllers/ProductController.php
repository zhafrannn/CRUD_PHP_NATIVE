<?php
// include_once('connection.php');

class ProductController {
    public function home(){
        readfile("Views/home.html") ;
    }
    public function addProduct(){
        include("Views/Add_Product/addProduct.html");
    }
    public function editProduct(){
        include("Views/edit.html");
    }
    public function createProduct($data) {
        $object = json_decode($data);
        
        $sku = ($object->sku);
        $name = ($object->name);
        $price = ($object->price); 
        $type = ($object->type);
        $typeAttr = ($object->typeAttr);
        
        $product = new $type($sku, $name, $price, $typeAttr);
        $product->save();
        
        echo json_encode(["data" => $typeAttr, "status" => 200, "msg" => "success created"]);
    }

    public static function readProduct(){

        $product = DB::query("SELECT * FROM Product");
        $dvd = DB::query("SELECT * FROM dvd");
        $furniture = DB::query("SELECT * FROM furniture");
        $book = DB::query("SELECT * FROM book");
        $type = [$dvd, $book, $furniture];
        
        for($i=0;$i<count($product);$i++){
            for($j=0;$j<count($type);$j++){
                if($j === 0){
                    for($k=0;$k<count($type[$j]);$k++){
                        if($product[$i]['SKU'] === $type[$j][$k]['productSKU']){
                            $size = $type[$j][$k]['Size'];
                            $dvd = "Size: " . $size . " MB";
                            $newProduct[] = [
                                $product[$i]['SKU'],
                                $product[$i]['Name'],
                                $product[$i]['Price'],
                                $dvd  
                            ];
                        };
                    }  
                }
                else if($j === 1){
                    for($k=0;$k<count($type[$j]);$k++){
                        if($product[$i]['SKU'] === $type[$j][$k]['productSKU']){
                            $weight = $type[$j][$k]['Weight'];
                            $book = "Weight: " . $weight . "KG";
                            $newProduct[] = [
                                $product[$i]['SKU'],
                                $product[$i]['Name'],
                                $product[$i]['Price'],
                                $book
                            ];
                        };
                    }
                }
                else{
                    for($k=0;$k<count($type[$j]);$k++){
                        if($product[$i]['SKU'] === $type[$j][$k]['productSKU']){
                            $length = $type[$j][$k]['length'];    
                            $width = $type[$j][$k]['width']; 
                            $height = $type[$j][$k]['height'];
                            $furniture = "Dimensions : " . $length . "CM x" . $width . "CM x" . $height . "CM";       
                            $newProduct[] = [
                                $product[$i]['SKU'],
                                $product[$i]['Name'],
                                $product[$i]['Price'],
                                $furniture     
                            ];
                        };
                    }
                }
            }
        }

        echo json_encode($newProduct);
        
    }

    public function updateProduct($data) {
        $object = json_decode($data);

        $sku = ($object->sku);
        $name = ($object->name);
        $price = ($object->price);

        $product = new Product($sku, $name, $price);
        $product->editProduct();
    }

    public function deleteProduct($data) {
        header('ContentType: application/json');
        $object = json_decode(($data));
        $skus = ($object->skus);
        
        foreach($skus as $sku){
            $sku = new Product($sku);
            $sku->deleteProduct();
        }
        echo json_encode(["data" => $skus, "status" => 200, "msg" => "success deleted"]);
    }

    public function show(){
        echo "berhasil";
    }   
}

?>