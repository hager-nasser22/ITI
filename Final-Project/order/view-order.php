<?php
$path = "..";
require '../vendor/autoload.php';

use App\Models\Order;


$ID = $_GET["ID"];
$orderInstance = new Order();
$order = $orderInstance->readById($ID);
if(empty($order)){
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
                    <h5 class="card-title mb-5 d-inline">View Order</h5>
                    <?php echo isset($alert)?$alert : '' ?>
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="<?= $order['firstname'] . ' ' . $order['lastname'] ?>" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="<?= $order['streetaddress'] . ', ' . $order['towncity'] ?>" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="<?= $order['phone'] ?>" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="<?= $order['email'] ?>" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="$<?= $order['payable_total_cost'] ?>" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="room_name" disabled id="form2Example1" class="form-control" value="<?= $order['status'] ?>" />

                        </div>

                        <br>



                        <!-- Submit button -->
                        <button name="submit" class="btn btn-primary  mb-4 text-center"><a class="text-decoration-none text-white text-capitalize" href="edit-order.php?ID=<?= $order["ID"] ?>">Edit</a></button>



                </div>
            </div>
        </div>
    </div>
</div>
</div>