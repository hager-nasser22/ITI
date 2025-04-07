<?php
$path = "..";
require '../vendor/autoload.php';
use App\Models\Product;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submit"]) && $_POST) {
        if (empty($_POST['product_title']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['type']) || empty($_FILES["image"]["name"])) {
            $alert = "<div class='alert alert-danger'>Product Not Created</div>";
        } else {
            $imageName = $_FILES["image"]["name"];
            $imageTmpName = $_FILES["image"]["tmp_name"];
            $imageDir = "../assets/images/" . basename($imageName);
            if (move_uploaded_file($imageTmpName, $imageDir)) {
                $productInstance = new Product();
                $productInstance->setProduct_title($_POST["product_title"])
                    ->setPrice($_POST["price"])
                    ->setDescription($_POST["description"])
                    ->setImage($imageName)
                    ->setType($_POST["type"]);
                if ($productInstance->create()) {
                    header("location:all-product.php");
                }
            } else {
                $alert = "<div class='alert alert-success'>There is Error In When Uploaded Image</div>";
            }
        }
    } else {
        $alert = "<div class='alert alert-danger'>Product Not Created</div>";
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
                            <h5 class="card-title mb-5 d-inline">Create Product</h5>
                            <?php echo isset($alert) ? $alert : '' ?>
                            <form method="POST" enctype="multipart/form-data">
                                <!-- Product Title input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="product_title" id="form2Example1" class="form-control" placeholder="Product Title" />
                                </div>
                                <!-- Price input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="price" id="form2Example1" class="form-control" placeholder="Price" />
                                </div>
                                <!-- Image input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="file" name="image" id="form2Example1" class="form-control" />
                                </div>
                                <!-- Description input -->
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <!-- Type input -->
                                <div class="form-outline mb-4 mt-4">
                                    <select name="type" class="form-select form-control" aria-label="Default select example">
                                        <option selected>Choose Type</option>
                                        <option value="hot_drink">Hot Drink</option>
                                        <option value="cold_drink">Cold Drink</option>
                                    </select>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>