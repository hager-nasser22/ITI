<?php
require "../vendor/autoload.php";
use App\Models\Product;

require 'layouts/header.php';
$productInst = new Product();
$products = $productInst->read(); 
$table = "All Products";
include("layouts/header2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Coffee Collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        :root {
            --brown-color: #6F4E37;
            --light-brown: #D2B48C;
            --cream: #F5F5DC;
        }

        .text-brown {
            color: var(--brown-color);
        }

        .bg-brown {
            background-color: var(--brown-color) !important;
        }

        .btn-brown {
            background-color: var(--brown-color);
            color: white;
            transition: 0.3s;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
        }

        .btn-brown:hover {
            background-color: var(--light-brown);
            color: var(--brown-color);
        }

        .product-card {
            transition: transform 0.3s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-img {
            height: 250px;
            object-fit: cover;
            transition: 0.3s;
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
        }

        .badge-custom {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--brown-color);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: white;
        }
    </style>
</head>
<body>

<section class="some-product">
    <div class="container py-5 ">
        <h2 class="text-center text-brown fw-bold mb-4"style=" font-family: 'Rubik Spray Paint', cursive;">Our Coffee Collection</h2>
        <div class="row">
            <?php foreach($products as $product) { ?>
            <div class="col-md-4 mb-4">
                <div class="card product-card border-0 shadow-lg">
                    <div class="position-relative">
                        <div class="overflow-hidden">
                            <img src="../assets/images/<?= $product["image"] ?>" 
                                 alt="<?= $product["product_title"] ?>" 
                                 class="product-img w-100">
                        </div>
                    </div>
                    <div class="card-body p-4 bg-light">
                        <h5 class="card-title mb-2 text-dark fw-bold"><?= $product["product_title"] ?></h5>
                        <p class="card-text text-muted mb-3"><?= $product["description"] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price text-brown fw-bold">$<?= $product["price"] ?></span>
                            <a href="view-product.php?ID=<?= $product["ID"] ?>" class="btn btn-brown">View</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

</body>
</html>

<?php include("layouts/footer.php") ?>
