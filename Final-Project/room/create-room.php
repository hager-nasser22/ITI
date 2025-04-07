<?php
$path = "..";
use App\Models\Room;

require '../vendor/autoload.php';
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submit"]) && $_POST) {
        if (empty($_POST['room_name'])) {
            $alert = "<div class='alert alert-danger'>Room Not Created</div>";
        } else {
            $roomInstance = new Room();
            $roomInstance->setRoom_name($_POST["room_name"]);
            if ($roomInstance->create()) {
                header("location:all-room.php");
            } else {
                $alert = "<div class='alert alert-danger'>Room Not Created</div>";
            }
        }
    } else {
        $alert = "<div class='alert alert-danger'>Room Not Created</div>";
    }
}
?>

    <div class="row dashboard-container">
        <?php require "../layouts/sidbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-5 d-inline">Create Room</h5>
                            <?php echo isset($alert) ? $alert : '' ?>
                            <form method="POST" enctype="multipart/form-data">
                                <!-- Room Name input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="room_name" id="form2Example1" class="form-control" placeholder="Room Name" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
