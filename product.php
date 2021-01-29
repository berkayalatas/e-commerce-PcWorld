<?php 
    ob_start();
    include('header.php')
?>



<?php

    //products section
    include("./templates/_products.php");

    
    //most popular product section
    include("./templates/_most-popular.php");
    
?>




<?php
    include("footer.php");
    ob_end_flush();
?>
