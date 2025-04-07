<?php
$path = "..";
use App\Models\Admin;

require '../vendor/autoload.php';

$ID = $_GET["ID"];
$adminInstance = new Admin();
$admin = $adminInstance->readById($ID);
if (empty($admin)) {
    header("location:404.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["submit"]) && $_POST) {
        $adminInstance->setAdmin_name($_POST["admin_name"])->setAdmin_email($_POST["admin_email"])->setAdmin_password($_POST["admin_password"]);
        if ($adminInstance->update($ID)) {
            header("location:all-admin.php");
        } else {
            $alert = "<div class='alert alert-danger'>Admin Not Updated</div>";
        }
    } else {
        $alert = "<div class='alert alert-danger'>Admin Not Updated</div>";
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
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-5 d-inline">Edit Admin</h5>
                            <?php echo isset($alert) ? $alert : '' ?>
                            <form method="POST" enctype="multipart/form-data">
                                <!-- Name input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="text" name="admin_name" id="form2Example1" class="form-control" value="<?= $admin["admin_name"] ?>" />
                                </div>
                                <!-- Email input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="email" name="admin_email" id="form2Example1" class="form-control" value="<?= $admin["admin_email"] ?>" />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4 mt-4">
                                    <input type="password" name="admin_password" id="form2Example1" class="form-control" value="<?= $admin["admin_password"] ?>" />
                                </div>
                                <!-- Submit button -->
                                <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>