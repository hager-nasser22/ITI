<nav class="sidebar p-3" style="width:19%;background-color:rgb(221, 186, 177);box-shadow: 10px 0 10px -5px rgba(0, 0, 0, 0.1);">
    <ul class="nav flex-column pt-5">
    <!-- <li class="nav-item">
    <a class="nav-link ms-4 fw-bold d-flex align-items-center" style="color: #5c3b36; text-decoration: none;" data-bs-toggle="collapse" href="<?= $path ?>/index.php" role="button" onmouseover="animateLetters(this)" onmouseout="resetLetters(this)">
        <i class="bi bi-cup-hot-fill me-2 coffee-icon" style="font-size: 50px; color: #b5766b;"></i> 
        <h1 class="mt-4 coffee-text" style="color: #b5766b;">
            <span class="letter">C</span>
            <span class="letter">o</span>
            <span class="letter">f</span>
            <span class="letter">f</span>
            <span class="letter">e</span>
            <span class="letter">e</span>
        </h1>
    </a>
</li> -->
        <!-- Home -->
        <li class="nav-item">
            <a class="nav-link ms-4 fw-bold d-flex align-items-center py-3 hover-effect" style="color:rgb(95 94 98);text-decoration:none;" data-bs-toggle="collapse" href="<?= $path ?>/index.php" role="button">
                <i class="bi bi-house-door me-2"></i> Home
            </a>
        </li>
        <!-- Rooms -->
        <li class="nav-item">
            <a class="nav-link ms-4 fw-bold d-flex align-items-center py-3 hover-effect" style="color:rgb(95 94 98);text-decoration:none;" data-bs-toggle="collapse" href="<?= $path ?>/room/all-room.php" role="button">
                <i class="bi bi-door-closed me-2"></i> Rooms
            </a>
        </li>
        <!-- Bookings -->
        <li class="nav-item">
            <a class="nav-link ms-4 fw-bold d-flex align-items-center py-3 hover-effect" style="color:rgb(95 94 98);text-decoration:none;" data-bs-toggle="collapse" href="<?= $path ?>/booking/all-bookings.php" role="button">
                <i class="bi bi-calendar-check me-2"></i> Bookings
            </a>
        </li>
        <!-- Orders -->
        <li class="nav-item">
            <a class="nav-link ms-4 fw-bold d-flex align-items-center py-3 hover-effect" style="color:rgb(95 94 98);text-decoration:none;" data-bs-toggle="collapse" href="<?= $path ?>/order/all-order.php" role="button">
                <i class="bi bi-cart me-2"></i> Orders
            </a>
        </li>
        <!-- Products -->
        <li class="nav-item">
            <a class="nav-link ms-4 fw-bold d-flex align-items-center py-3 hover-effect" style="color:rgb(95 94 98);text-decoration:none;" data-bs-toggle="collapse" href="<?= $path ?>/product/all-product.php" role="button">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>
        <!-- Users -->
        <li class="nav-item">
            <a class="nav-link ms-4 fw-bold d-flex align-items-center py-3 hover-effect" style="color:rgb(95 94 98);text-decoration:none;" data-bs-toggle="collapse" href="<?= $path ?>/admins/all-admin.php" role="button">
                <i class="bi bi-people me-2"></i> Admins
            </a>
        </li>
    </ul>
</nav>

<style>
        @keyframes rotateIcon {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes bounceLetter {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    .coffee-icon {
        transition: all 0.5s ease;
    }

    .coffee-text .letter {
        display: inline-block;
        transition: all 0.3s ease;
    }

    .coffee-text:hover .letter {
        animation: bounceLetter 0.5s ease;
    }
    @keyframes scaleText {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }

    .coffee-icon {
        transition: all 0.5s ease;
    }

    .coffee-text {
        transition: all 0.5s ease;
    }
    .hover-effect {
        transition: all 0.3s ease;
    }
    .hover-effect:hover {
        transform: scale(1.05); 
        color: #fff !important; 
        background-color: rgba(255, 255, 255, 0.1); 
        border-radius: 8px; 
        padding-left: 15px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .sidebar {
        animation: slideIn 0.5s ease-out;
    }

    .bi {
        transition: all 0.3s ease;
    }
    .hover-effect:hover .bi {
        transform: scale(1.2); 
    }
</style>
<script>
    function animateLetters(element) {
        const icon = element.querySelector('.coffee-icon');
        icon.style.animation = 'rotateIcon 2s linear infinite';

        const letters = element.querySelectorAll('.letter');
        letters.forEach((letter, index) => {
            letter.style.animation = `bounceLetter 0.5s ease ${index * 0.1}s`;
        });
    }

    function resetLetters(element) {
        const icon = element.querySelector('.coffee-icon');
        icon.style.animation = 'none';

        const letters = element.querySelectorAll('.letter');
        letters.forEach(letter => {
            letter.style.animation = 'none';
        });
    }
</script>