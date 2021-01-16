<?php 

//require MySQL Connection
require('../database/DBController.php');

//require Product Class 
require('../database/Product.php');

// DBController object
$database = new DBController();

//product object
$product = new Product($database);


if(isset($_POST['itemId'])){
    $result = $product->getProduct($_POST['itemId']);
    echo json_encode($result);
}

?>