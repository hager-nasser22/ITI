<?php
require '../vendor/autoload.php';

use App\Models\Room;

if (!isset($_GET["ID"])) {
    header("location:404.php");
    exit();
}

$ID = $_GET["ID"];
$roomInstance = new Room();
$room = $roomInstance->readById($ID);

if (empty($room)) {
    header("location:404.php");
    exit();
}

$roomInstance->delete($ID);
header("location:all-room.php");
exit();
?>
