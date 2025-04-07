<?php
$path = "..";
require '../vendor/autoload.php';

use App\Models\Admin;

if (!isset($_GET["ID"]) || empty($_GET["ID"])) {
    header("location:404.php");
    exit;
}

$ID = $_GET["ID"];
$adminInstance = new Admin();
$admin = $adminInstance->readById($ID);

if (empty($admin)) {
    header("location:404.php");
    exit;
}

if ($adminInstance->delete($ID)) {
    header("location:all-admin.php");
    exit;
} else {
    echo "<div class='alert alert-danger'>Failed to delete the admin.</div>";
}
?>
