<?php

use App\Models\Order;

require "../vendor/autoload.php";
require 'layouts/header.php';

$orderInstance = new Order();
$allOrders = $orderInstance->read();
$table = "All Orders";

include("layouts/header2.php");
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="row justify-content-between align-items-center mb-3">
                        <h4 class="text-brown fw-bold col-auto">📋 All Orders</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allOrders as $order) { ?>
                                    <tr>
                                        <td><strong><?= $order["ID"] ?></strong></td>
                                        <td><?= htmlspecialchars($order["firstname"]) ?></td>
                                        <td class="fw-bold text-success">$<?= number_format($order["payable_total_cost"], 2) ?></td>
                                        <td>
                                            <span class="badge bg-<?php
                                                echo $order["status"] == 'Pending' ? 'warning text-dark' : 
                                                     ($order["status"] == 'Shipped' ? 'primary' : 'success');
                                            ?>">
                                                <?= htmlspecialchars($order["status"]) ?>
                                            </span>
                                        </td>
                                        <td><?= date("d M Y", strtotime($order["created_at"])) ?></td>
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

<style>
    :root {
        --brown-color: #6F4E37;
        --light-brown: #D2B48C;
        --cream: #F5F5DC;
    }

    .text-brown {
        color: var(--brown-color);
    }

    .table-hover tbody tr:hover {
        background-color: var(--cream);
        transition: 0.3s ease-in-out;
    }

    .card {
        background-color: #fff;
    }

    .badge {
        font-size: 14px;
        padding: 6px 12px;
        border-radius: 15px;
    }
</style>
<?php include("layouts/footer.php") ?>
