<?php
require "../vendor/autoload.php";

use App\Models\Cart;
use App\Models\Product;

require 'layouts/header.php';
$table = "View Product";
include("layouts/header2.php");
$ID = $_GET["ID"];
$productInstance = new Product();
$product = $productInstance->readById($ID);
if (empty($product)) {
    header("location:404.php");
}
if(isset($_POST["submit"])){
    if(!isset($_SESSION["user_id"])){
        header("location:login.php");
        exit();
    }
    $cartInstance = new Cart();
    $cartInstance->setProduct_title($_POST["product_title"])->setProduct_quantity($_POST["product_quantity"])->setProduct_description($_POST["product_description"])
    ->setProduct_image($_POST["product_image"])->setProduct_price($_POST["product_price"])->setUser_id($_SESSION["user_id"])->setProduct_id($product["ID"]);
    if($cartInstance->create()){
        header("location:all-cart.php");
    }
}
?>


<section class="view-product">
    <div class="container mt-5 mb-5">
        <div class="row">
            
            <div class="col-md-5">
                <div class="product-image-wrapper">
                    <img width="300px" height="300px" src="../assets/images/<?= $product["image"] ?>" alt="<?= $product["product_title"] ?>" class="img-fluid rounded shadow product-image" id="mainImage">
                </div>
            </div>

            
            <div class="col-md-7">
                <h2 class="text-brown fw-bold"><?= $product["product_title"] ?></h2>
                <div class="mb-3">
                    <span class="h4 text-dark fw-bold">$<?= $product["price"] ?></span>
                </div>

                
                <div class="mb-3">
                    <span class="text-warning fs-5">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </span>
                    <span class="ms-2 text-muted">(4.5 - 120 reviews)</span>
                </div>

                <p class="text-muted"><?= $product["description"] ?></p>

                <form method="POST">
                    <input type="hidden" name="product_title" value="<?= $product["product_title"] ?>">
                    <input type="hidden" name="product_image" value="<?= $product["image"] ?>">
                    <input type="hidden" name="product_price" value="<?= $product["price"] ?>">
                    <input type="hidden" name="product_description" value="<?= $product["description"] ?>">

                    <div class="mb-4">
                        <label for="quantity" class="form-label fw-bold">Quantity:</label>
                        <input type="number" name="product_quantity" class="form-control w-25" id="quantity" value="1" min="1">
                    </div>

                    <button class="btn btn-brown btn-lg shadow" type="submit" name="submit">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --brown-color: #6F4E37;
        --light-brown: #D2B48C;
        --cream: #F5F5DC;
    }

    .text-brown {
        color: var(--brown-color);
    }

    .btn-brown {
        background-color: var(--brown-color);
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        transition: 0.3s;
    }

    .btn-brown:hover {
        background-color: var(--light-brown);
        color: var(--brown-color);
    }

    .product-image {
        border-radius: 15px;
        transition: transform 0.3s ease-in-out;
    }

    .product-image:hover {
        transform: scale(1.05);
    }
</style>


<?php include("layouts/footer.php") ?>


