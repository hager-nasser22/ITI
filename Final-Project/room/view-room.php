<?php
$path = "..";
require '../vendor/autoload.php';

use App\Models\Room;

include_once("../layouts/header.php");
include_once("../layouts/top-page.php");

$ID = $_GET["ID"];
$roomInstance = new Room();
$room = $roomInstance->readById($ID);
if (empty($room)) {
    header("location:404.php");
}
?>

    <div class="row dashboard-container">
        <?php require "../layouts/sidbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-5 d-inline">View Room</h5>
                            <?php echo isset($alert) ? $alert : '' ?>
                            <!-- Room Name input -->
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="<?= htmlspecialchars($room["room_name"]) ?>" />
                            </div>

                            <!-- Edit button -->
                            <a href="edit-room.php?ID=<?= $room['ID'] ?>" class="btn btn-primary mb-4 text-center text-decoration-none">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>