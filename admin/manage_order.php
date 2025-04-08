<?php require("partials/header.php"); ?>

<div class="container">
    <h4 class="text-center m-4 position-relative">
        Manage Order
    </h4>
</div>

<?php

if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}


?>
<div class="container text-center">

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Order id</th>
                <th scope="col">Food</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Order Date</th>
                <th scope="col">Status</th>
                <th scope="col">User_id</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $sql = "SELECT * FROM tbl_order";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $x = 1;
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id =  $rows['id'];
                    $food = $rows['food'];
                    $price = $rows['price'];
                    $quantity = $rows['qty'];
                    $total = $rows['total'];
                    $order_date = $rows['order_date'];
                    $status = $rows['status'];
                    $user_id = $rows['u_id'];

            ?>
                    <tr>
                        <th scope="row"><?php echo $x++; ?></th>
                        <td><?php echo $food; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $user_id; ?></td>
                        <td>
                            <a href="<?php $siteUrl; ?>update_order.php?id=<?php echo $id; ?>" type="submit" name="update" class="btn btn-primary bg-success btn-sm mb-2">Update</a>
                        </td>

                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>



<?php require("partials/footer.php"); ?>