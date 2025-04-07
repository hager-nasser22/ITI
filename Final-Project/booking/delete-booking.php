<?php
require '../vendor/autoload.php';


use App\Models\Booking;

$ID = $_GET["ID"];
$bookInstance = new Booking();
$book = $bookInstance->readById($ID);
if(empty($book)){
    header("location:404.php");
}
$bookInstance->delete($ID);
header("location:all-bookings.php");