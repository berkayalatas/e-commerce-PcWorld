<?php 
    ob_start();
    include('header.php')
?>

<?php

    //banner section 
    include("./templates/_banner-area.php");

    //most popular product section
    include("./templates/_most-popular.php");

    
    //most special offers section
    include("./templates/_speacial-offers.php");

    //website adds section
    include("./templates/_banner-ads.php");

    
    //new  computers section
    include("./templates/_new-computers.php");


    //website news section
    include("./templates/_news.php");

?>



<?php
    include("footer.php")
?>
