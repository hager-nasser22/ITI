<?php

require "../vendor/autoload.php";


use App\Models\Room;
use App\Models\Booking;

$roomInstance = new Room();
$rooms = $roomInstance->getAvailableRooms();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $booking = new Booking();

    $booking->setUser_id($_POST["admin_id"]);
    $booking->setFirst_name($_POST["first_name"]);
    $booking->setLast_name($_POST["last_name"]);
    $booking->setDate($_POST["date"]);
    $booking->setTime($_POST["time"]);
    $booking->setPhone_number($_POST["phone_number"]);
    $booking->setMessage($_POST["message"]);
    $booking->setRoom_NO($_POST["room_NO"]);
    $booking->setStatus("Pending");
    
    if ($booking->create()) {
        $_SESSION["success"] = "Booking added successfully!";
    } else {
        $_SESSION["error"] = "Failed to add booking. Please try again.";
    }
    header("Location: all-bookings.php");
    exit();
}

$path = "..";
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");
?>
<div class="row dashboard-container">

    <?php require "../layouts/sidbar.php"; ?>
    <div class="container-fluid mt-5 mb-5">
        <div class="card p-4 shadow">
            <h2 class="text-center mb-4">Add New Booking</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Booking Date</label>
                    <input type="date" class="form-control" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Booking Time</label>
                    <input type="time" class="form-control" name="time" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="room_NO">Room</label>
                    <select name="room_NO" id="room_NO" required class="form-control">
                        <option value="">Choose a Room</option>
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= htmlspecialchars($room['ID']) ?>">
                                <?= htmlspecialchars($room['room_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="admin_id" value="<?= $_SESSION['admin_id'] ?>"> <!-- user ID from session -->

                <button type="submit" class="btn btn-primary w-100">Submit Booking</button>
            </form>
        </div>
    </div>

</div>