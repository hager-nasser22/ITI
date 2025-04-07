<?php
$path = "..";
require '../vendor/autoload.php';
use App\Models\Order;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"])) {
    $order = new Order();
    $order->setFirstname($_POST["firstname"])
        ->setLastname($_POST["lastname"])
        ->setStreetaddress($_POST["streetaddress"])
        ->setAppartment($_POST["appartment"])
        ->setTowncity($_POST["towncity"])
        ->setPostcode($_POST["postcode"])
        ->setPhone($_POST["phone"])
        ->setEmail($_POST["email"])
        ->setPayable_total_cost($_POST["payable_total_cost"])
        ->setUser_id(1)
        ->setStatus("Pending");

    if ($order->create()) {
        header("Location: all-order.php");
        exit();
    } else {
        $alert = "<div class='alert alert-danger'>Failed to create order</div>";
    }
}

include_once("../layouts/header.php");
include_once("../layouts/top-page.php");

?>
<div class="row dashboard-container">

<?php require "../layouts/sidbar.php"; ?>
<div class="container-fluid mt-5 mb-5" >
    <h2 class="mt-4">Create New Order</h2>
    <?= isset($alert) ? $alert : '' ?>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
        </div>
        <div class="mb-3">
            <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
        </div>
        <div class="mb-3">
            <input type="text" name="streetaddress" class="form-control" placeholder="Street Address" required>
        </div>
        <div class="mb-3">
            <input type="text" name="appartment" class="form-control" placeholder="Apartment (Optional)">
        </div>
        <div class="mb-3">
            <input type="text" name="towncity" class="form-control" placeholder="Town/City" required>
        </div>
        <div class="mb-3">
            <input type="text" name="postcode" class="form-control" placeholder="Postcode" required>
        </div>
        <div class="mb-3">
            <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="number" name="payable_total_cost" class="form-control" placeholder="Total Cost ($)" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>

</div>