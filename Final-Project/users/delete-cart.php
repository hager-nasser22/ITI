<?php
session_start();
require "../vendor/autoload.php";
use App\Models\Cart;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartID = $_POST["cart_id"];

    if ($cartID) {
        $cart = new Cart();
        if ($cart->delete($cartID)) {
            $_SESSION["success"] = "Item deleted successfully!";
        } else {
            $_SESSION["error"] = "Failed to delete item!";
        }
    }
    header("Location: all-cart.php");
    exit();
}
?>
