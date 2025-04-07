<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Heebo:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Serif+Georgian:wght@100..900&family=Pacifico&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg custom-navbar p-3">
    <div class="container">
        <a class="navbar-brand text-warning fw-bold" style=" font-family: 'Rubik Spray Paint', cursive;" href="#">☕ Coffee</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="ftco-nav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item pe-3"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item pe-3"><a href="all-bookings.php" class="nav-link">Booking</a></li>
                <li class="nav-item pe-3"><a href="orders.php" class="nav-link">Orders</a></li>

                <?php if(isset($_SESSION["user_id"])) { ?>
                    
                    <li class="nav-item pe-3">
                        <span class="user-info">
                            <i class="fa-solid fa-user me-2"></i> <?= $_SESSION["user_name"] ?>
                        </span>
                    </li>
                    
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-outline-light logout-btn">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item pe-3"><a href="login.php" class="nav-link">Login</a></li>
                    <li class="nav-item pe-3"><a href="register.php" class="nav-link">Register</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>


    