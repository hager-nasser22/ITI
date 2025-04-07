<?php

use App\Models\Booking;

require "../vendor/autoload.php";
require 'layouts/header.php';

$bookingInstance = new Booking();

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo "<div class='alert alert-danger'>You need to log in to view your bookings.</div>";
    exit;
}

$allBookings = $bookingInstance->readByUserId($user_id);
$table = "My Bookings";

include("layouts/header2.php");
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col">
            <div class="card shadow-lg border-0" style="background-color: #FAF3E0;">
                <div class="card-body">
                    <div class="row justify-content-between p-3">
                        <h5 class="card-title mb-4 col-3 text-brown"style=" font-family: 'Rubik Spray Paint', cursive;">My Bookings</h5>
                        <button class="btn btn-brown col-2 "> 
                            <a href="booking.php" class="text-white text-decoration-none">Add Book</a>
                        </button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr class="bg-brown text-white">
                                <th scope="col">#</th>
                                <th scope="col">Room No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(count($allBookings)!=0){
                            foreach ($allBookings as $booking) { ?>
                                <tr>
                                    <td><?= $booking["ID"] ?></td>
                                    <td><?= $booking["room_NO"] ?></td>
                                    <td><?= date("d M Y", strtotime($booking["date"])) ?></td>
                                    <td><?= date("H:i", strtotime($booking["time"])) ?></td>
                                    <td>
                                        <span class="badge bg-<?php
                                                                echo $booking["status"] == 'Pending' ? 'warning' : ($booking["status"] == 'Confirmed' ? 'success' : 'danger');
                                                                ?>">
                                            <?= $booking["status"] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php }}else{?>
                                <tr><td >No Booking</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --brown-color: #6F4E37;
        --light-cream: #FAF3E0;
        --dark-brown: #5a3e2b;
    }

    .text-brown {
        color: var(--brown-color);
    }

    .bg-brown {
        background-color: var(--brown-color) !important;
    }

    .btn-brown {
        background-color: var(--brown-color);
        border: none;
    }

    .btn-brown:hover {
        background-color: var(--dark-brown);
    }
</style>
<?php include("layouts/footer.php") ?>
