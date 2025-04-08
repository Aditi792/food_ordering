<?php include("partials-front/header.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Order</title>
    <style>
        h1 {
            text-align: center;
            color: #333;
            padding: 20px 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0px;
            border: 1px solid rgb(226, 31, 31);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #ff6b6b;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>My Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($_SESSION['u_id'])) {
                    $uId = $_SESSION['u_id'];
                }

                $sql = "SELECT * FROM tbl_order WHERE u_id = $uId";

                $res = mysqli_query($conn, $sql);

                if ($res && mysqli_num_rows($res) > 0) {

                    while ($rows = mysqli_fetch_assoc($res)) {

                        $id = $rows['u_id'];
                        $price = $rows['price'];
                        $food = $rows['food'];
                        $qty = $rows['qty'];
                        $status = $rows['status'];
                        $total = $rows['total'];

                ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $food; ?></td>
                            <td>₹<?php echo $price; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><span <?php $sts = '';
                                        if ($status == 'ordered') $sts = 'ordered';
                                        elseif ($status == 'on delivery') $sts = 'on delivery';
                                        elseif ($status == 'delivered') $sts = 'delivered';
                                        else $sts = 'cancelled';
                                        ?>class="status <?php echo $sts; ?>"><?php echo $status; ?></span></td>
                            <td>₹<?php echo $total; ?></td>
                        </tr><?php
                            }
                        }
                                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php include("partials-front/footer.php") ?>