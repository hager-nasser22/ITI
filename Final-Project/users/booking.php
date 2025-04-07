<?php
require "../vendor/autoload.php";
use App\Models\Room;
use App\Models\Booking;

$roomInstance = new Room();
$rooms = $roomInstance->getAvailableRooms();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $booking = new Booking();
    
    $booking->setUser_id($_POST["user_id"]);
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
require 'layouts/header.php'; 
$table = "Add Booking";

include("layouts/header2.php");
?>

<div class="container mt-5 mb-5">
    <div class="card p-4 shadow-lg border-0 rounded-4">
        <h2 class="text-center mb-4 text-brown">📝 Add New Booking</h2>
        
        <form method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date" class="form-label">Booking Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="time" class="form-label">Booking Time</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                        <input type="time" class="form-control" name="time" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control" name="phone_number" placeholder="Enter your phone number" pattern="^\d{10,15}$" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="3" placeholder="Additional requests (optional)"></textarea>
            </div>

            <div class="mb-3">
                <label for="room_NO" class="form-label">Room</label>
                <select name="room_NO" id="room_NO" class="form-control" required>
                    <option value="">Choose a Room</option>
                    <?php foreach ($rooms as $room): ?>
                        <option value="<?= htmlspecialchars($room['ID']) ?>">
                            <?= htmlspecialchars($room['room_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-check-circle"></i> Submit Booking
            </button>
        </form>
    </div>
</div>

<style>
    :root {
        --brown-color: #6F4E37;
        --light-cream: #FAF3E0;
    }

    .text-brown {
        color: var(--brown-color);
    }

    .card {
        background-color: var(--light-cream);
    }

    .btn-primary {
        background-color: var(--brown-color);
        border: none;
    }

    .btn-primary:hover {
        background-color: #5a3e2b;
    }
</style>


<?php require 'layouts/footer.php'; ?>