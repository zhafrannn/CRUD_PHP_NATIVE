<?php

require_once __DIR__ . '/vendor/autoload.php';
// require_once 'db.class.php';

use Bramus\Router\Router;

$router = new Router();
$productController = new ProductController();

// Define a route for the homepage
$router->get('/', function() {
    $GLOBALS['productController']->home();
});
$router->get('/addProduct', function() {
    $GLOBALS['productController']->addProduct();
});
$router->get('/editProduct', function() {
    $GLOBALS['productController']->editProduct();
});

$router->mount('/product', function () use ($router) {

    $router->post('/create', function() {
        $data = file_get_contents('php://input');
        
        $GLOBALS['productController']->createProduct($data);
    });
    
    $router->get('/read', function() {
        $GLOBALS['productController']->readProduct();
    });
    
    $router->put('/update', function() {
        $data = file_get_contents('php://input');
     
        $GLOBALS['productController']->updateProduct($data);
    });

    $router->put('/update/{id}', function() {
        $data = file_get_contents('php://input');
     
        $GLOBALS['productController']->updateProduct($data);
    });
    
    $router->delete('/delete', function() {
        $data = file_get_contents('php://input');
        
        $GLOBALS['productController']->deleteProduct($data);
    });
});

$router->run();


?>