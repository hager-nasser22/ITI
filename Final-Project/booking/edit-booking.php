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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submit"]) && $_POST) {
        $bookingInstance->setFirst_name($_POST["first_name"]);
        $bookingInstance->setLast_name($_POST["last_name"]);
        $bookingInstance->setDate($_POST["date"]);
        $bookingInstance->setTime($_POST["time"]);
        $bookingInstance->setPhone_number($_POST["phone_number"]);
        $bookingInstance->setMessage($_POST["message"]);
        $bookingInstance->setStatus($_POST["status"]);
        if ($bookingInstance->update($ID)) {
            header("location:all-bookings.php");
        } else {
            $alert = "<div class='alert alert-danger'>Booking Not Updated</div>";
        }
    } else {
        $alert = "<div class='alert alert-danger'>Booking Not Updated</div>";
    }
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
                    <h5 class="card-title mb-5 d-inline">Edit Booking</h5>
                    <?php echo isset($alert) ? $alert : '' ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="first_name" class="form-control" value="<?= $booking["first_name"] ?>" placeholder="First Name" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="last_name" class="form-control" value="<?= $booking["last_name"] ?>" placeholder="Last Name" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="date" name="date" class="form-control" value="<?= $booking["date"] ?>" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="time" name="time" class="form-control" value="<?= $booking["time"] ?>" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="phone_number" class="form-control" value="<?= $booking["phone_number"] ?>" placeholder="Phone Number" />
                        </div>
                        <div class="form-outline mb-4">
                            <textarea name="message" class="form-control" placeholder="Message"> <?= $booking["message"] ?> </textarea>
                        </div>
                        <div class="form-outline mb-4">
                            <select name="status" class="form-control">
                                <option value="pending" <?= $booking["status"] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="confirmed" <?= $booking["status"] == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                <option value="cancelled" <?= $booking["status"] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>