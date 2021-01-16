<?php

//fetch product data 
class Product {
    public $database = null;

    public function __construct(DBController $database){
        if(!isset($database->connection)) return null; 
        $this->database = $database;
    }

    //fetch product data using getData method
    public function getData($table= 'product'){
        $result = $this->database->connection->query("SELECT * FROM ($table)");

        $resultArray = array();

        //fetch product data one by one    
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    //get product using item id
    public function getProduct($item_id = null, $table='product'){
        if(isset($item_id)){
            $result = $this->database->connection->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");            
            //fetch product data one by one 
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
    
            return $resultArray;
        }
    }

}