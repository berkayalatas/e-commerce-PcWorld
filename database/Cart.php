<?php

class Cart {

    public $database = null;

    public function __construct(DBController $database){
        if(!isset($database->connection)){
            return null;
        }  
        $this->database = $database;    
    }
    public function insertIntoCart($params = null, $table = "cart"){
        if($this->database->connection != null){
            if($params != null) {
                //insert into cart(user_id) values(0);
                // get table columns
                $columns = implode(',',array_keys($params));
                $values = implode(',',array_values($params));
 
                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);                
                //execute query
                $result = $this->database->connection->query($query_string);
                return $result;
            }
        }
    }
    //get user_id and item_id and insert into cart table
    public function addToCart($userId,$itemId) {
        if(isset($userId) && isset($itemId)){
            $params = array(
                "user_id" => $userId,
                "item_id" => $itemId, 
            );
            //insert data into cart
            $result = $this->insertIntoCart($params);
            if($result) {
                //reload page
                header('Location: '.$_SERVER['PHP_SELF']);
                die;
            }
        }
    }

 // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->database->connection->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                //reload page
                header("Location:" . $_SERVER['PHP_SELF']);
                die;
            }
            return $result;
        }
    }


    //calculate subtotal
    public function getSubtotal($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }


    //get item id of shopping cart list
    public function getCartId($cartArray = null, $key = 'item_id'){
        if($cartArray != null){
            $cart_id = array_map(function($value) use($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    //Add to Wishlist
    public function addToWishlist($item_id = null,$saveTable="wishlist", $fromTable="cart"){
        if($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id ={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id = {$item_id};";

            //execute multiple query
            $result = $this->database->connection->multi_query($query);
            if($result){
                //reload page
                header("Location:" . $_SERVER['PHP_SELF']);
                die;
            }
            return $result;
        }
    }
}
