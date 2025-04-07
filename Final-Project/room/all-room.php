<?php
$path = "..";
use App\Models\Room;

require '../vendor/autoload.php';
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");


$roomInstance = new Room();
$allRooms = $roomInstance->read();

?>


    <div class="row dashboard-container">
        <?php require "../layouts/sidbar.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center mb-4">
                                <h5 class="card-title col-auto mb-0">Available Rooms</h5>
                                <a href="create-room.php" class="btn btn-primary col-auto">Create Room</a>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allRooms as $room) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars($room["ID"]) ?></td>
                                            <td><?= htmlspecialchars($room["room_name"]) ?></td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="view-room.php?ID=<?= $room['ID'] ?>" class="btn btn-warning">View</a>
                                                    <a href="edit-room.php?ID=<?= $room['ID'] ?>" class="btn btn-success">Edit</a>
                                                    <a href="delete-room.php?ID=<?= $room['ID'] ?>" class="btn btn-danger">Delete</a>
                                                </div>
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
</body>
</html>