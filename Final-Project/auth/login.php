<?php


use App\Models\Admin;

require '../vendor/autoload.php';
include_once("../layouts/header.php");

$alert = ""; 
if (isset($_SESSION['admin_id'])) {
    header("location:../index.php");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['admin_email']) || empty($_POST['admin_password'])){
        $alert = "<div class='alert alert-danger'>Email Or Password is Required</div>";
    } else {
        $adminInstance = new Admin();
        $admin = $adminInstance->readByEmail($_POST["admin_email"]);
        
        if($admin) { 
            if(password_verify($_POST["admin_password"], $admin["admin_password"])) {
                $_SESSION['admin_name'] = $admin['admin_name'];
                $_SESSION['admin_email'] = $admin['admin_email'];
                $_SESSION['admin_id'] = $admin['ID'];
                header("location:../index.php");
                exit;
            } else {
                $alert = "<div class='alert alert-danger'>Email Or Password is Incorrect</div>";
            }
        } else {
            $alert = "<div class='alert alert-danger'>Email Or Password is Incorrect</div>";
        }
    }
}
?>
<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="row " style="width: 75%;">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-5">Login</h5>
                    <?= $alert ?> 
                    <form method="POST" class="p-auto">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="admin_email" id="form2Example1" class="form-control" placeholder="Email" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="admin_password" id="form2Example2" placeholder="Password" class="form-control" required />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
