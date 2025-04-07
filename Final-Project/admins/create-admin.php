<?php
require '../vendor/autoload.php';
$path = "..";

use App\Models\Admin;

$adminInstance = new Admin();
$allAdmins = $adminInstance->read();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"])) {
    $adminInstance->setAdmin_name($_POST["admin_name"])
                  ->setAdmin_email($_POST["admin_email"])
                  ->setAdmin_password($_POST["admin_password"]);
    if ($adminInstance->create()) {
        header("location: all-admin.php");
        exit();
    } else {
        $alert = "<div class='alert alert-danger'>Admin Not Created</div>";
    }
}
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");
?>


<div class="row dashboard-container">
    <?php require "../layouts/sidbar.php"; ?>
    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col">
                <div class="card p-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Create Admin</h5>
                        <?php echo isset($alert) ? $alert : '' ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="admin_name" class="form-control" placeholder="Admin Name" required />
                            </div>
                            <div class="form-outline mb-4 mt-4">
                                <input type="email" name="admin_email" class="form-control" placeholder="Admin Email" required />
                            </div>
                            <div class="form-outline mb-4 mt-4">
                                <input type="password" name="admin_password" class="form-control" placeholder="Admin Password" required />
                            </div>
                            <button type="submit" name="submit" class="btn mb-4">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
