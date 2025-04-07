<?php

use App\Models\Order;
use App\Models\Cart;

require "../vendor/autoload.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $totalPrice = $_POST["total_price"];
    $user_id = $_SESSION["user_id"];

    $order = new Order();
    $order->setFirstname($_SESSION["user_name"]);
    $order->setLastname("User");
    $order->setStreetaddress("123 Main St");
    $order->setAppartment("Apt 1");
    $order->setTowncity("Test City");
    $order->setPostcode("12345");
    $order->setPhone("1234567890");
    $order->setEmail($_SESSION["user_email"]);
    $order->setPayable_total_cost($totalPrice);
    $order->setUser_id($user_id);
    $order->setStatus("Pending");

    if ($order->create()) {
        $cart = new Cart();
        $cart->setUser_id($user_id);
        $cart->clearCart();

        echo "<script>alert('Order Placed Successfully!'); window.location.href='orders.php';</script>";
    } else {
        echo "<script>alert('Error placing order!'); window.location.href='all-cart.php';</script>";
    }
}

?>
