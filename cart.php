<?php
ob_start();
include('header.php')
?>



<?php

//include cart items if it is not empty
count($product->getData('cart')) ? 
include("./templates/_cart-template.php") : 
include("./templates/empty_list/_cart_not_found.php");

//wishlist template
count($product->getData('wishlist')) ? 
include("./templates/_wishlist.php") : 
include("./templates/empty_list/wishlist_not_found.php");

//most popular product section
include("./templates/_new-computers.php");

?>




<?php
include("footer.php")
?>
