<?php include("partials-front/header.php") ?>

<?php
//CHeck whether food id is set or not
if (isset($_GET['food_id'])) {
    //Get the Food id and details of the selected food
    $food_id = $_GET['food_id'];

    //Get the DEtails of the SElected Food
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //CHeck whether the data is available or not
    if (mysqli_num_rows($res) == 1) {
        //WE Have DAta
        //GEt the Data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        //Food not Availabe
        //REdirect to Home Page
        header('location:' . $siteUrl);
    }
} else {
    //if not get food id
    //Redirect to homepage
    header('location:' . $siteUrl);
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="container">
    <div class="container m-4 ">
        <h2 class="text-center m-4 p-4">Please Confirm to place order</h2>

        <form action="" method="POST">
        <div class="container w-75 border border-danger-subtle py-4">
            <div class="row rounded ">
                <!-- Image Section -->
                        <div class="col-md-4">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='alert alert-danger'>Image not Available.</div>";
                        } else {
                        ?>
                            <img src="<?php echo $siteUrl; ?>images/food/<?php echo $image_name; ?>"
                                alt="Food" class="w-100 ">
                        <?php
                        }
                        ?>
                </div>

                <!-- Food Details Section -->
                <div class="col-md-6">
                    <h3 class="py-3 fs-3"><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="fw-bold text-danger fs-5">₹<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <label for="qty" class="form-label fw-bold">Quantity</label>
                    <input type="number" name="qty" id="qty" class="form-control" value="1" required>
                    <!-- Confirm Order Button -->
                    <div class="text-center mt-4">
                        <button type="submit" name="submit" class="btn btn-success w-20">Confirm Order</button>
                    </div>
                </div>
            </div>
    </div>


    </form>

    <?php

    //CHeck whether submit button is clicked or not
    if (isset($_POST['submit'])) {
        if (empty($_SESSION["u_id"])) {
            header('location:login.php');
        } else {
            // Get all the details from the form

            $food = $_POST['food'];
            $price = floatval($_POST['price']);
            $qty = intval($_POST['qty']);

            $total = $price * $qty; // total = price x qty 

            $order_date = date("Y-m-d h:i:sa"); //Order DAte

            $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

            $u_id = $_SESSION["u_id"];




            //Save the Order in Databaase
            //Create SQL to save the data
            $sql2 = "INSERT INTO tbl_order SET 
      food = '$food',
      price = $price,
      qty = $qty,
      total = $total,
      order_date = '$order_date',
      status = '$status',
      u_id='$u_id'
       ";

            //echo $sql2; die();

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Check whether query executed successfully or not
            if ($res2 == true) {
                //Query Executed and Order Saved

                $_SESSION['order'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    food ordered successfully!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
                header('location:' . $siteUrl);
            } else {
                //Failed to Save Order
                $_SESSION['order'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Failed to ordered food!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
                header('location:' . $siteUrl);
            }
        }
    }
    ?>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include("partials-front/footer.php") ?>