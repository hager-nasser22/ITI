<?php
$path = "..";
use App\Models\Booking;

require '../vendor/autoload.php';

$ID = $_GET["ID"];
$bookingInstance = new Booking();
$booking = $bookingInstance->readById($ID);
if (empty($booking)) {
    header("location:404.php");
}
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");

?>
<div class="row dashboard-container">

<?php require "../layouts/sidbar.php"; ?>
<div class="container-fluid mt-5 mb-5" >
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">View Booking</h5>
                    <div class="form-outline mb-4 mt-4">
                        <label>User ID:</label>
                        <input type="text" class="form-control" value="<?= $booking["user_id"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>First Name:</label>
                        <input type="text" class="form-control" value="<?= $booking["first_name"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" value="<?= $booking["last_name"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>Date:</label>
                        <input type="text" class="form-control" value="<?= $booking["date"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>Time:</label>
                        <input type="text" class="form-control" value="<?= $booking["time"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>Phone Number:</label>
                        <input type="text" class="form-control" value="<?= $booking["phone_number"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>Message:</label>
                        <textarea class="form-control" disabled><?= $booking["message"] ?></textarea>
                    </div>
                    <div class="form-outline mb-4">
                        <label>Status:</label>
                        <input type="text" class="form-control" value="<?= $booking["status"] ?>" disabled />
                    </div>
                    <div class="form-outline mb-4">
                        <label>Room No:</label>
                        <input type="text" class="form-control" value="<?= $booking["room_NO"] ?>" disabled />
                    </div>
                    <a href="edit-booking.php?ID=<?= $booking["ID"] ?>" class="btn btn-success">Edit</a>
                    <a href="delete-booking.php?ID=<?= $booking["ID"] ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>