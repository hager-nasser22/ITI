<style>
    .top-bar {
        background-color: rgb(221, 186, 177);
        padding: 12px 36px;
        box-shadow: 5px 0 10px rgba(0, 0, 0, 0.1);
    }

    .search-box {
        width: 60%;
        transition: all 0.3s ease;
    }

    .search-box:focus {
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border-color: #b5766b;
    }

    .user-dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        min-width: 150px;
        z-index: 1000;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #5c3b36;
        transition: background 0.3s;
    }

    .dropdown-menu a:hover {
        background: rgba(221, 186, 177, 0.5);
    }

    .user-info {
        font-weight: 600;
        padding: 8px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .user-info:hover {
        background-color: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
</style>

<!-- شريط علوي -->
<div class="top-bar d-flex justify-content-between align-items-center">
    <!-- اللوجو بدون تغيير -->
    <div class="fw-bold fs-4">
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
    </div>

    <!-- مربع البحث -->
    <div class="flex-grow-1">
        <input class="form-control search-box mx-auto" type="search" placeholder="Search....." aria-label="Search">
    </div>

    <!-- اسم المستخدم مع القائمة المنسدلة -->
    <div class="user-dropdown">
        <div class="user-info" onclick="toggleDropdown()">
            👤 <?= $_SESSION['admin_name'] ?>
        </div>
        <div class="dropdown-menu" id="userDropdown">
            <a href="#">Profile</a>
            <a href="<?= $path ?>/auth/logout.php">Logout</a>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("userDropdown");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener("click", function(event) {
        var dropdown = document.getElementById("userDropdown");
        var userInfo = document.querySelector(".user-info");
        if (!userInfo.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = "none";
        }
    });
</script>
