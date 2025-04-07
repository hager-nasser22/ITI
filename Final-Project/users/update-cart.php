<?php
session_start();
require "../vendor/autoload.php";
use App\Models\Cart;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartID = $_POST["cart_id"];
    $quantity = $_POST["quantity"];

    if ($cartID && $quantity > 0) {
        $cart = new Cart();
        $cart->setProduct_quantity($quantity);
        if ($cart->update($cartID)) {
            $_SESSION["success"] = "Quantity updated successfully!";
        } else {
            $_SESSION["error"] = "Failed to update quantity!";
        }
    }
    header("Location: all-cart.php");
    exit();
}
?>
