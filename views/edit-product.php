<?php
session_start();

include "../classes/Product.php";

$product = new Product;
$product_details = $product->getProduct($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-between">
        <a href="dashboard.php" class="ms-3" title="Home">
            <i class="fa-solid fa-house fa-2x text-dark"></i>
        </a>

        <a href="profile.php" class="nav-link text-secondary">
            <span class="fw-bold fs-5">Welcome, <?= ucfirst($_SESSION['full_name'])?></span>
        </a>

        <!-- <div class="ms-auto me-3 navbar-nav"> -->
            <a href="../actions/logout.php" class="me-3" title="Logout"><i class="fa-solid fa-user-xmark fa-2x text-danger"></i></a>
        <!-- </div> -->
    </nav>
    <main class="container" style="padding-top: 80px;">
        <div class="card w-50 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center">EDIT PRODUCT</h2>
            </div>
            <div class="card-body">
            <form action="../actions/edit-product.php" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" id="product_name" 
                        value="<?= $product_details['product_name'] ?>" class="form-control mb-2" required autofocus>

                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" 
                        value="<?= $product_details['price'] ?>" class="form-control mb-2" required>

                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="number" name="quantity" id="quantity" 
                        value="<?= $product_details['quantity'] ?>" class="form-control mb-2 fw-bold" required>

                    <div class="text-end">
                        <button type="submit" class="btn btn-warning btn-sm px-5">
                            Save
                        </button>
                        <a href="dashboard.php" class="btn btn-secondary btn-sm">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>