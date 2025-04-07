<?php
require '../vendor/autoload.php';
$path = "..";

use App\Models\Admin;

$adminInstance = new Admin();
$allAdmins = $adminInstance->read();
include_once("../layouts/header.php");
include_once("../layouts/top-page.php");
?>

<div class="row dashboard-container">
    <?php require "../layouts/sidbar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <h5 class="card-title mb-4 col-auto">Available Admins</h5>
                            <a href="create-admin.php" class="btn btn-primary col-auto">Create Admin</a>
                        </div>

                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allAdmins as $admin){ ?>
                                <tr>
                                    <td><?= $admin["ID"] ?></td>
                                    <td><?= $admin["admin_name"] ?></td>
                                    <td><?= $admin["admin_email"] ?></td>
                                    <td>
                                        <a href="view-admin.php?ID=<?= $admin['ID'] ?>" class="btn btn-warning me-3">View</a>
                                        <a href="edit-admin.php?ID=<?= $admin['ID'] ?>" class="btn btn-success me-3">Edit</a>
                                        <a href="delete-admin.php?ID=<?= $admin['ID'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>