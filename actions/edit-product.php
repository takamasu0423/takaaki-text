<?php
    include "../classes/Product.php";
      //die(var_dump($_POST));
    $product = new Product;
    $product->editProduct($_POST);
    
?>