<?php
    include "../classes/Product.php";
      //die(var_dump($_POST));
    $product = new Product;
    $product->deleteProduct($_GET['id']);
    
?>