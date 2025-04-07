<?php
require 'vendor/autoload.php';
$path = ".";

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Product;
use App\Models\Room;
// echo $_SESSION['admin_name'];
// exit;

require "layouts/header.php";
if (!isset($_SESSION['admin_id'])) {
    header("location:./auth/login.php");
}
require "layouts/top-page.php";
//query for Product
$productInstance = new Product();
$products = $productInstance->read();
//query for orders;
$orderInstance = new Order();
$orders = $orderInstance->read();
//query for Bookings
$bookingInstance = new Booking();
$bookings = $bookingInstance->read();
//query for Rooms
$roomInstance = new Room();
$rooms = $roomInstance->read();
//query for Admins
$adminInstance = new Admin();
$admin = $adminInstance->read();
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #fdf6f0; 
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }
    
    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        width: 80%;
    }
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        background: #d9a79f; 
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .card:hover {
        transform: rotateY(360deg);
        transition: 1s;
    }
    .card-body {
        text-align: center;
        padding: 25px;
    }
    .card-title {
        font-weight: 700;
        font-size: 18px;
        color: white; 
        margin-bottom: 10px;
    }
    .card-text {
        font-size: 22px;
        font-weight: bold;
        color: #fdf6f0; 
        transition: color 0.3s ease-in-out;
    }
    .card:hover .card-text {
        color: #b5766b;
    }
</style>

<div class="dashboard-container">
    <?php require "layouts/sidbar.php"; ?>
    <div class="dashboard-content">
        <div class="card-container">
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-box-seam" style="font-size: 30px; color: white;"></i>
                    <h5 class="card-title"> Products</h5>
                    <p class="card-text"><?php echo count($products); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-cart-check" style="font-size: 30px; color: white;"></i>
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text"><?php echo count($orders); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-house-door" style="font-size: 30px; color: white;"></i>
                    <h5 class="card-title">Rooms</h5>
                    <p class="card-text"><?php echo count($rooms); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-calendar-check" style="font-size: 30px; color: white;"></i>
                    <h5 class="card-title">Bookings</h5>
                    <p class="card-text"><?php echo count($bookings); ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <i class="bi bi-person-badge" style="font-size: 30px; color: white;"></i>
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text"><?php echo count($admin); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
