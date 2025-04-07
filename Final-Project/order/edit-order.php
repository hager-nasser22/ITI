<?php
$path = "..";
use App\Models\Order;

require '../vendor/autoload.php';



$ID = $_GET["ID"];
$orderInstance = new Order();
$order = $orderInstance->readById($ID);
if (empty($order)) {
    header("location:404.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["update_status"]) && $_POST) {
        $orderInstance->setStatus($_POST["status"]);
        if ($orderInstance->update($ID)) {
            header("location:all-order.php");
        } else {
            $alert = "<div class='alert alert-danger'>Order Not Upadated</div>";
        }
    } else {
        $alert = "<div class='alert alert-danger'>Order Not Upadated</div>";
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
                    <h5 class="card-title mb-5 d-inline">Edit Order</h5>
                    <?php echo isset($alert) ? $alert : '' ?>


                    <form method="POST">
                        <div class="form-outline mb-4 mt-4">
                            <input type="hidden" name="order_id" value="<?= $order['ID'] ?>">
                            <select name="status" class="form-select">
                                <option value="Pending" <?= $order['status'] == "Pending" ? "selected" : "" ?>>Pending</option>
                                <option value="Processing" <?= $order['status'] == "Processing" ? "selected" : "" ?>>Processing</option>
                                <option value="Completed" <?= $order['status'] == "Completed" ? "selected" : "" ?>>Completed</option>
                                <option value="Cancelled" <?= $order['status'] == "Cancelled" ? "selected" : "" ?>>Cancelled</option>
                            </select>
                            <button type="submit" name="update_status" class="btn btn-warning">Update</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
