<?php
$path = "..";
use App\Models\Order;

require '../vendor/autoload.php';

$orderInstance = new Order();
$allOrder = $orderInstance->read();
foreach ($allOrder as $order) { 
    if($order['status']== 'Cancelled'){
        header("location:delete-order.php?ID={$order['ID']}");
        exit;
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
                    <div class="row justify-content-between">
                        <h5 class="card-title mb-4 col-3">Available Orders</h5>
                        <a href="create-order.php" class="btn btn-primary mb-4 text-center col-2">Create Orders</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr class="">
                                <th>#</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Total Cost</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allOrder as $order) { ?>
                                <tr>
                                    <td><?= $order['ID'] ?></td>
                                    <td><?= $order['firstname'] . ' ' . $order['lastname'] ?></td>
                                    <td><?= $order['phone'] ?></td>
                                    <td><?= $order['status'] ?></td>
                                    <td>$<?= $order['payable_total_cost'] ?></td>
                                    <td class="">
                                        <button class="btn btn-warning me-3"><a href="view-order.php?ID=<?= $order['ID'] ?>" class="text-decoration-none text-white text-capitalize">view</a></button>
                                        <button class="btn btn-success me-3"><a href="edit-order.php?ID=<?= $order['ID'] ?>" class="text-decoration-none text-white text-capitalize">Edit</a></button>
                                        <button class="btn btn-danger"><a href="delete-order.php?ID=<?= $order['ID'] ?>" class="text-decoration-none text-white text-capitalize">delete</a></button>
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