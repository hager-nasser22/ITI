<?php

use App\Models\Cart;

require "../vendor/autoload.php";
$totalPrice = 0;
$cartInstance = new Cart();
require 'layouts/header.php';


$cartInstance->setUser_id($_SESSION["user_id"]);
$allCartItems = $cartInstance->read();
foreach ($allCartItems as $item) {
    $totalPrice += $item["product_price"] * $item["product_quantity"];
}
$table = "All Carts";
include("layouts/header2.php");

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <h5 class="card-title text-brown col-6" >🛒 Your Shopping Cart</h5>
                    </div>

                    <table class="table table-hover align-middle">
                        <thead class="table-brown">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allCartItems as $item) { ?>
                                <tr>
                                    <td><?= $item["ID"] ?></td>
                                    <td><?= htmlspecialchars($item["product_title"]) ?></td>
                                    <td>
                                        <img src="../assets/images/<?= htmlspecialchars($item["product_image"]) ?>" 
                                            alt="Product Image" 
                                            class="rounded-3 shadow-sm" 
                                            width="60" height="60">
                                    </td>
                                    <td>$<?= number_format($item["product_price"], 2) ?></td>
                                    <td>
                                        <form method="POST" action="update-cart.php" class="d-inline">
                                            <input type="hidden" name="cart_id" value="<?= $item['ID'] ?>">
                                            <input type="number" name="quantity" value="<?= $item['product_quantity'] ?>" min="1" class="form-control w-50 d-inline text-center">
                                            <button type="submit" class="btn btn-sm btn-brown ms-2">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="delete-cart.php" class="d-inline">
                                            <input type="hidden" name="cart_id" value="<?= $item['ID'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card p-4 shadow border-0 rounded-4 text-center bg-light-cream">
                <h4 class="text-brown">Total Price: <span class="text-success">$<?= number_format($totalPrice, 2) ?></span></h4>
                <form action="checkout.php" method="POST" class="mt-3">
                    <input type="hidden" name="total_price" value="<?= $totalPrice ?>">
                    <button type="submit" class="btn btn-brown w-100">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --brown-color: #6F4E37;
        --light-cream: #FAF3E0;
        --dark-brown: #5A3E2B;
    }

    .text-brown {
        color: var(--brown-color);
        font-weight: bold;
    }

    .table-brown {
        background-color: var(--light-cream);
        color: var(--brown-color);
    }

    .btn-brown {
        background-color: var(--brown-color);
        border: none;
        color: white;
    }

    .btn-brown:hover {
        background-color: var(--dark-brown);
    }

    .bg-light-cream {
        background-color: var(--light-cream);
    }
</style>

<?php include("layouts/footer.php") ?>
