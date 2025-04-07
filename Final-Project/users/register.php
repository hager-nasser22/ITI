<?php
require "../vendor/autoload.php";
require "layouts/header.php";

use App\Models\User;

$error = [
    "name" => "",
    "email" => "",
    "password" => ""
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["user_name"]));
    $email = filter_var(trim($_POST["user_email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["user_pass"]);

    if (empty($name) || strlen($name) < 3) {
        $error["name"] = "Name must be at least 3 characters long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Invalid email format.";
    }

    if (strlen($password) < 6) {
        $error["password"] = "Password must be at least 6 characters.";
    }

    if (empty($error["name"]) && empty($error["email"]) && empty($error["password"])) {
        $hashedPassword = $password;

        $userInstance = new User();
        $userInstance->setUserName($name)
            ->setUserEmail($email)
            ->setUserPass($hashedPassword);

        if ($userInstance->create()) {
            header("Location: login.php");
            exit();
        } else {
            $error["general"] = "Registration failed. Please try again.";
        }
    }
}
?>

<style>
.card {
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeIn 1s ease-in-out forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


input:focus {
    border-color: #007bff !important;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5) !important;
    transition: all 0.3s ease-in-out;
}


.shake {
    animation: shake 0.3s ease-in-out;
}

@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
}


.btn-primary {
    transition: all 0.3s ease-in-out;
}

.btn-primary:hover {
    background-color: #0056b3 !important;
    transform: scale(1.05);
}
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center text-brown fw-bold mb-4">Register</h3>
                    
                    <?php if (!empty($error["general"])): ?>
                        <div class="alert alert-danger text-center"><?= $error["general"]; ?></div>
                    <?php endif; ?>

                    <form method="POST" id="registerForm">
                        <div class="mb-3">
                            <label for="user_name" class="form-label fw-bold text-dark">Name</label>
                            <input 
                                type="text" 
                                class="form-control rounded-pill p-2" 
                                id="user_name" 
                                name="user_name" 
                                placeholder="Enter your name" 
                                required 
                            />
                            <small class="text-danger" id="error_name"><?= $error["name"] ?? ''; ?></small>
                        </div>

                        <div class="mb-3">
                            <label for="user_email" class="form-label fw-bold text-dark">Email Address</label>
                            <input 
                                type="email" 
                                class="form-control rounded-pill p-2" 
                                id="user_email" 
                                name="user_email" 
                                placeholder="Enter your email" 
                                required 
                            />
                            <small class="text-danger" id="error_email"><?= $error["email"] ?? ''; ?></small>
                        </div>

                        <div class="mb-3">
                            <label for="user_pass" class="form-label fw-bold text-dark">Password</label>
                            <input 
                                type="password" 
                                class="form-control rounded-pill p-2" 
                                id="user_pass" 
                                name="user_pass" 
                                placeholder="Enter your password" 
                                required 
                            />
                            <small class="text-danger" id="error_password"><?= $error["password"] ?? ''; ?></small>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-brown btn-lg px-4 rounded-pill shadow-sm">
                                <i class="bi bi-person-plus"></i> Register
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

    small {
        font-size: 14px;
    }
</style>


<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm").addEventListener("submit", function (e) {
        let name = document.getElementById("user_name").value.trim();
        let email = document.getElementById("user_email").value.trim();
        let password = document.getElementById("user_pass").value.trim();
        
        let errorName = document.getElementById("error_name");
        let errorEmail = document.getElementById("error_email");
        let errorPassword = document.getElementById("error_password");
        
        let inputName = document.getElementById("user_name");
        let inputEmail = document.getElementById("user_email");
        let inputPassword = document.getElementById("user_pass");

        let isValid = true;

        errorName.textContent = "";
        errorEmail.textContent = "";
        errorPassword.textContent = "";

        inputName.classList.remove("shake");
        inputEmail.classList.remove("shake");
        inputPassword.classList.remove("shake");

        if (name.length < 3) {
            errorName.textContent = "Name must be at least 3 characters long.";
            inputName.classList.add("shake");
            isValid = false;
        }

        if (!/^\S+@\S+\.\S+$/.test(email)) {
            errorEmail.textContent = "Invalid email format.";
            inputEmail.classList.add("shake");
            isValid = false;
        }

        if (password.length < 6) {
            errorPassword.textContent = "Password must be at least 6 characters.";
            inputPassword.classList.add("shake");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
});
</script>

<?php include("layouts/footer.php"); ?>
