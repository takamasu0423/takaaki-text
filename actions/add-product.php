<?php
    include "../classes/Product.php";

    $product = new Product;
    $product->addProduct($_POST);
    
?>