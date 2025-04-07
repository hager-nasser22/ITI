<?php
$path = "..";

use App\Models\Booking;

require '../vendor/autoload.php';

$bookingInstance = new Booking();
$allBookings = $bookingInstance->read();
foreach ($allBookings as $book) { 
    if($book['status']== 'cancelled'){
        header("location:delete-booking.php?ID={$book['ID']}");
        exit;
    }
}
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");
?>
<div class="row dashboard-container">

    <?php require "../layouts/sidbar.php"; ?>
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <h5 class="card-title mb-4 col-3">All Bookings</h5>
                            <a href="add-book.php" class="btn btn-primary mb-4 text-center col-2">Create Booking</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allBookings as $booking) { ?>
                                    <tr>
                                        <td><?= $booking["ID"] ?></td>
                                        <td><?= $booking["first_name"] ?></td>
                                        <td><?= $booking["last_name"] ?></td>
                                        <td><?= $booking["date"] ?></td>
                                        <td><?= $booking["time"] ?></td>
                                        <td><?= $booking["phone_number"] ?></td>
                                        <td><?= $booking["status"] ?></td>
                                        <td>
                                            <button class="btn btn-warning me-3"><a href="view-booking.php?ID=<?= $booking['ID'] ?>" class="text-decoration-none text-white">View</a></button>
                                            <button class="btn btn-success me-3"><a href="edit-booking.php?ID=<?= $booking['ID'] ?>" class="text-decoration-none text-white">Edit</a></button>
                                            <button class="btn btn-danger"><a href="delete-booking.php?ID=<?= $booking['ID'] ?>" class="text-decoration-none text-white">Delete</a></button>
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