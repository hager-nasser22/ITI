<?php
$path = "..";
use App\Models\Product;

require '../vendor/autoload.php';
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");

$productInstance = new Product();
$allProduct = $productInstance->read();

?>


    <div class="row dashboard-container">
        <?php require "../layouts/sidbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center mb-4">
                                <h5 class="card-title col-auto mb-0">Available Foods</h5>
                                <a href="create-product.php" class="btn btn-primary col-auto">Create Product</a>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allProduct as $product) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars($product["ID"]) ?></td>
                                            <td><?= htmlspecialchars($product["product_title"]) ?></td>
                                            <td><img width="50px" height="50px" src="../assets/images/<?= htmlspecialchars($product["image"]) ?>" alt="Product Image"></td>
                                            <td><?= htmlspecialchars($product["price"]) ?></td>
                                            <td><?= htmlspecialchars($product["type"]) ?></td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="view-product.php?ID=<?= $product['ID'] ?>" class="btn btn-warning">View</a>
                                                    <a href="edit-product.php?ID=<?= $product['ID'] ?>" class="btn btn-success">Edit</a>
                                                    <a href="delete-product.php?ID=<?= $product['ID'] ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>