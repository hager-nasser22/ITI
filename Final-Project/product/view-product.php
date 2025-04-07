<?php
$path = "..";
require '../vendor/autoload.php';
use App\Models\Product;


$ID = $_GET["ID"];
$productInstance = new Product();
$product = $productInstance->readById($ID);
if (empty($product)) {
    header("location:404.php");
}
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");
?>

    <div class="row dashboard-container">
        <?php require "../layouts/sidbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-5 d-inline">View Product</h5>
                            <?php echo isset($alert) ? $alert : '' ?>
                            <!-- Product Title input -->
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="product_title" disabled id="form2Example1" class="form-control" value="<?= htmlspecialchars($product["product_title"]) ?>" />
                            </div>
                            <!-- Price input -->
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="price" disabled id="form2Example1" class="form-control" value="<?= htmlspecialchars($product["price"]) ?>" />
                            </div>
                            <!-- Image input -->
                            <div class="form-outline mb-4 mt-4">
                                <img src="../assets/images/<?= htmlspecialchars($product["image"]) ?>" width="100px" height="100px" alt="Product Image">
                            </div>
                            <!-- Description input -->
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea name="description" disabled class="form-control" id="exampleFormControlTextarea1" rows="3"><?= htmlspecialchars($product["description"]) ?></textarea>
                            </div>
                            <!-- Type input -->
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="type" disabled id="form2Example1" class="form-control" value="<?= htmlspecialchars($product["type"]) ?>" />
                            </div>
                            <!-- Edit button -->
                            <a href="edit-product.php?ID=<?= $product['ID'] ?>" class="btn btn-primary mb-4 text-center text-decoration-none">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>