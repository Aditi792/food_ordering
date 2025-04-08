<?php
require_once("partials/header.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "SELECT food,price,qty,status,total from tbl_order WHERE id=$id";

$res = mysqli_query($conn, $sql);
if ($res == true) {
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);

        $food = $rows['food'];
        $price = $rows['price'];
        $quantity = $rows['qty'];
        $status = $rows['status'];
    } else {
        //DEtail not Available/
        //Redirect to Manage Order
        header('location:' . $siteUrl . 'manage_order.php');
    }
} else {
    //Redirect to Manage Order
    header('location:' . $siteUrl . 'manage_order.php');
}
?>

<body>
    <h4 class="text-center m-4">Update Order</h4>
    <form action="" method="post">
        <div class="container w-50 h-80">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Food</label>
                <input type="text" name="food" class="form-control" id="exampleInputEmail1" value="<?php echo $food ?>" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputEmail1" value="<?php echo $price ?>" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="qty" class="form-label fw-bold">Quantity</label>
                <input type="number" name="qty" id="qty" class="form-control" value="<?php echo $quantity ?>" required>
            </div>
            <div class="form-group mb-3">
                <select name="status_select">
                    <option <?php echo ($status == 'Ordered') ? 'selected' : ''; ?>value="Ordered">Ordered</option>
                    <option <?php echo ($status == 'On Delivery') ? 'selected' : ''; ?>value="On Delivery">On Delivery</option>
                    <option <?php echo ($status == 'Delivered') ? 'selected' : ''; ?>?value="Delivered">Delivered</option>
                    <option <?php echo ($status == 'Cancelled') ? 'selected' : ''; ?>value="Cancelled">Cancelled</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary m-2" name="submit" value="Update order">
        </div>
    </form>
</body>



<?php
if (isset($_POST['submit'])) {

    $food = $_POST['food'];
    $price = $_POST['price'];
    $quantity_new = $_POST['qty'];
    $status = $_POST['status_select'];

    if($quantity_new != $quantity){
        $total = floatval($price) * intval($quantity_new);
    }else{
        $total = floatval($price) * intval($quantity);
    }

    $sql1 = "UPDATE `tbl_order` SET food = '$food' , price = '$price',qty = '$quantity_new',total = '$total',status = '$status' WHERE id =$id;";
    $res1 = mysqli_query($conn, $sql1);


    if ($res1 == true) {
        $_SESSION['update'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
  Order Updated Successfully!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("Location:"  . $siteUrl . 'admin/manage_order.php');
    } else {
        $_SESSION['update'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Order not update!!!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location:" . $siteUrl . 'admin/manage_order.php');
    }
}

?>




<?php
require("partials/footer.php");
?>