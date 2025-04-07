<?php
$path = "..";
require '../vendor/autoload.php';

use App\Models\Admin;


$ID = $_GET["ID"];
$adminInstance = new Admin();
$admin = $adminInstance->readById($ID);
if(empty($admin)){
    header("location:404.php");
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
                    <h5 class="card-title mb-5 d-inline">View Admin</h5>
                    <?php echo isset($alert)?$alert : '' ?>
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="admin_name" disabled id="form2Example1" class="form-control" value="<?= $admin["admin_name"] ?>" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="admin_email" disabled id="form2Example1" class="form-control" value="<?= $admin["admin_email"] ?>" />

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="admin_password" disabled class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $admin["admin_password"] ?></textarea>
                        </div>


                        <br>



                        <!-- Submit button -->
                        <button name="submit" class="btn btn-primary  mb-4 text-center"><a class="text-decoration-none text-white text-capitalize" href="edit-admin.php?ID=<?= $admin["ID"] ?>">Edit</a></button>



                </div>
            </div>
        </div>
    </div>
</div>
</div>