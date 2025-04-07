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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submit"]) && $_POST) {
        $alert = "<div class='alert alert-danger'>Product Not updated</div>";
        if (!empty($_FILES["image"]["name"])) {
            $imageName = $_FILES["image"]["name"];
            $imageTmpName = $_FILES["image"]["tmp_name"];
            $imageDir = "../assets/images/" . basename($imageName);
            if (move_uploaded_file($imageTmpName, $imageDir)) {
                $productInstance->setImage($imageName);
            } else {
                $alert = "<div class='alert alert-success'>There is Error In When Uploaded Image</div>";
            }
        } else {
            $imageName = $product["image"];
            $productInstance->setImage($imageName);
        }
        $productInstance->setProduct_title($_POST["product_title"])
        ->setPrice($_POST["price"])
        ->setDescription($_POST["description"])
        ->setType($_POST["type"]);
        if ($productInstance->update($ID)) {
            header("location:all-product.php");
        }
    } else {
        $alert = "<div class='alert alert-danger'>Product Not Updated</div>";
    }
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
                            <h5 class="card-title mb-5 d-inline">Edit Product</h5>
                            <?php echo isset($alert) ? $alert : '' ?>
                            <form method="POST" enctype="multipart/form-data">
                                <!-- Product Title -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="product_title" id="form2Example1" class="form-control" value="<?= $product['product_title'] ?>" />
                                </div>
                                <!-- Price -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="price" id="form2Example1" class="form-control" value="<?= $product['price'] ?>" />
                                </div>
                                <!-- Image -->
                                <div class="form-outline mb-4 mt-4">
                                    <img id="imagePrevious" src="../assets/images/<?= $product["image"] ?>" width="100px" height="100px" alt="">
                                    <input onchange="previewFile()" id="imageFile" type="file" name="image" id="form2Example1" class="form-control" />
                                </div>
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $product["description"] ?></textarea>
                                </div>
                                <!-- Type -->
                                <div class="form-outline mb-4 mt-4">
                                    <select name="type" class="form-select form-control" aria-label="Default select example">
                                        <option value="" <?= empty($product["type"]) ? 'selected' : '' ?>>Choose Type</option>
                                        <option value="hot_drink" <?= ($product["type"] ?? '') == "hot_drink" ? 'selected' : '' ?>>Hot Drink</option>
                                        <option value="cold_drink" <?= ($product["type"] ?? '') == "cold_drink" ? 'selected' : '' ?>>Cold Drink</option>
                                    </select>
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewFile() {
            var imagePrevious = document.getElementById("imagePrevious");
            var imageFile = document.getElementById("imageFile").files[0];
            if (imageFile) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePrevious.src = e.target.result;
                }
                reader.readAsDataURL(imageFile);
            }
        }
    </script>