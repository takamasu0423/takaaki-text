<?php

include "../classes/Product.php";

// isset going to reduceproduct
$pay = new Product;
$pay->reduceProduct($_POST);
// print_r($_POST);

?>
