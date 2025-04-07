<?php
require '../vendor/autoload.php';

use App\Models\Product;

if (!isset($_GET["ID"])) {
    header("location:404.php");
    exit();
}

$ID = $_GET["ID"];
$productInstance = new Product();
$product = $productInstance->readById($ID);

if (empty($product)) {
    header("location:404.php");
    exit();
}

$imagePath = "../assets/images/{$product['image']}";
if (file_exists($imagePath) && is_file($imagePath)) {
    unlink($imagePath);
}

$productInstance->delete($ID);
header("location:all-product.php");
exit();
?>
