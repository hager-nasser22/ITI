<?php
require "../vendor/autoload.php";
require 'layouts/header.php';

use App\Models\User;

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $userInstance = new User();
    $user = $userInstance->readByEmail($email);

    if ($user && password_verify($password, $user["user_pass"])) {
        $_SESSION["user_id"] = $user["ID"];
        $_SESSION["user_name"] = $user["user_name"];
        $_SESSION["user_email"] = $user["user_email"];
        
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center text-brown fw-bold mb-4">Login</h3>
                    
                    <?php if (isset($error) && !empty($error)): ?>
                        <div class="alert alert-danger text-center"><?= $error; ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold text-dark">Email Address</label>
                            <input 
                                type="email" 
                                class="form-control rounded-pill p-2" 
                                id="email" 
                                name="email" 
                                placeholder="Enter your email" 
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold text-dark">Password</label>
                            <input 
                                type="password" 
                                class="form-control rounded-pill p-2" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password" 
                                required
                            />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-brown btn-lg px-4 rounded-pill shadow-sm">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --brown-color: #6F4E37;
        --light-brown: #D2B48C;
        --cream: #F5F5DC;
    }

    .text-brown {
        color: var(--brown-color);
    }

    .btn-brown {
        background-color: var(--brown-color);
        color: white;
        padding: 10px 20px;
        transition: 0.3s;
        border: none;
    }

    .btn-brown:hover {
        background-color: var(--light-brown);
        color: var(--brown-color);
    }

    .card {
        background-color: var(--cream);
    }

    .form-control {
        border: 2px solid var(--light-brown);
    }

    .form-control:focus {
        border-color: var(--brown-color);
        box-shadow: 0 0 5px var(--brown-color);
    }
</style>


<?php include("layouts/footer.php") ?>
