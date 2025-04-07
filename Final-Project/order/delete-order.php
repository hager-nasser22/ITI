<?php
require '../vendor/autoload.php';


use App\Models\Order;

$ID = $_GET["ID"];
$orderInstance = new Order();
$order = $orderInstance->readById($ID);
if(empty($order)){
    header("location:404.php");
}
$orderInstance->delete($ID);
header("location:all-order.php");