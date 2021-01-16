<?php
//require MySQL Connection
require('database/DBController.php');

//require Product Class 
require('database/Product.php');

//require Cart Class
require('database/Cart.php');

// DBController object
$database = new DBController();

//product object
$product = new Product($database);
$product_shuffle = $product->getData();

//Cart object
$Cart = new Cart($database);
$Cart->getCartId($product->getData('cart'));