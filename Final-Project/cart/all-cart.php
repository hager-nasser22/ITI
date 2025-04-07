<?php

use App\Models\Cart;

require '../vendor/autoload.php';
include_once("../layouts/header.php");

$cartInstance = new Cart();

$user_id = 1;
$cartInstance->setUser_id($user_id);
$allCartItems = $cartInstance->read();

?>

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <h5 class="card-title mb-4 col-3">Your Shopping Cart</h5>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($allCartItems as $item){ ?>
                            <tr>
                                <td><?= $item["ID"] ?></td>
                                <td><?= $item["product_title"] ?></td>
                                <td><img src="<?= $item["product_image"] ?>" alt="Product Image" width="50"></td>
                                <td>$<?= $item["product_price"] ?></td>
                                <td><?= $item["product_quantity"] ?></td>
                                <td>
                                    <button class="btn btn-warning me-3">
                                        <a href="view-cart.php?ID=<?= $item['ID'] ?>" class="text-decoration-none text-white text-capitalize">View</a>
                                    </button>
                                    <button class="btn btn-success me-3">
                                        <a href="edit-cart.php?ID=<?= $item['ID'] ?>" class="text-decoration-none text-white text-capitalize">Edit</a>
                                    </button>
                                    <button class="btn btn-danger">
                                        <a href="delete-cart.php?ID=<?= $item['ID'] ?>" class="text-decoration-none text-white text-capitalize">Delete</a>
                                    </button>
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
