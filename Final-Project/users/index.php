<?php
// session_start();

require "../vendor/autoload.php";
use App\Models\Product;

require 'layouts/header.php';
$productInst = new Product();
$products = $productInst->read();
?>
<header>
    <div class="parent">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="text-white" style=" font-family: 'Rubik Spray Paint', cursive;">Welcome To Our Coffee Shop</h1>
            <button class="btn pt-2 pb-2 ps-4 pe-4 mt-4 col-2"><a href="products.php" class="text-decoration-none text-white" style=" font-family: 'Rubik Spray Paint', cursive;">See Our Products</a> </button>
        </div>
    </div>
</header>
<section class="about py-5 bg-light p-5" id="about">
    <div class="container p-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold" style=" font-family: 'Rubik Spray Paint', cursive;">Our History</h2>
                <p class=" pt-2" style="color: hsl(12deg 12.2% 32.16%);">
                    We make and grow the best coffee in Peru, accompanying
                    families since 1930, with professional workers who
                    harvest, collect and select the coffee with quality
                    work, thus providing exquisite coffee to enjoy together
                    as a family.
                </p>
            </div>

            <div class="col-md-6 text-center">
                <img src="assets/images/about-coffee.png" alt="about image" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</section>
<section class="categories py-5 bg-light" id="categories">
    <div class="container">
        <h2 class="text-center fw-bold mb-4" style=" font-family: 'Rubik Spray Paint', cursive;">Our Categories</h2>
        <div class="row justify-content-center">
            
            <div class="col-md-5 mt-5 mb-5">
                <div class="card category-card shadow-lg border-0 p-3 text-center">
                    <i class="fas fa-mug-hot fa-4x mb-3"></i>
                    <h3 class="fw-bold">Hot Drinks</h3>
                    <p class="text-muted">Enjoy our finest selection of hot beverages, brewed to perfection.</p>
                </div>
            </div>

            <div class="col-md-5 mt-5 mb-5">
                <div class="card category-card shadow-lg border-0 p-3 text-center">
                    <i class="fas fa-glass-martini-alt fa-4x mb-3"></i>
                    <h3 class="fw-bold">Cold Drinks</h3>
                    <p class="text-muted">Refreshing and chilled drinks for a perfect cool-down moment.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="some-product">
    <div class="container py-5">
    <h2 class="text-center fw-bold mb-4" style=" font-family: 'Rubik Spray Paint', cursive;">Our Products</h2>
        <div class="row justify-content-center">
            <?php $counter=0?>
            <?php foreach($products as $product){?>
            <div class="col-md-4">
                <div class="card product-card border-0 rounded-4 shadow-sm">
                    <div class="position-relative">
                        <span class="badge badge-custom">New Arrival</span>
                        <div class="overflow-hidden">
                            <img src="../assets/images/<?= $product["image"] ?>" alt="Product Image" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3 fw-bold"><?= $product["product_title"] ?></h5>
                        <p class="card-text text-muted mb-4"><?= $product["description"] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">$<?= $product["price"] ?></span>
                            <button class="btn btn-custom text-white px-4 py-2 rounded-pill">
                            <a href="view-product.php?ID=<?= $product["ID"] ?>" class="text-decoration-none text-white">View</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php $counter++; if($counter == 3 ) break; } ?>
            <button class="btn btn-danger pt-2 pb-2 ps-4 pe-4 mt-5 col-2"><a href="products.php" class="text-decoration-none text-white">See More Products</a> </button>
        </div>
    </div>
</section>

<?php include("layouts/footer.php") ?>
