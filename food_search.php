<?php include("partials-front/header.php") ?>

        <?php
        $search = $_POST['search'];
        ?>



    <!-- Food Menu Section -->
<section class="food-menu" id="food-menu">
    <div class="container">
        <div class="section-title">
            <h2>Our Dishes</h2>
            <p>Browse through our most ordered menu items</p>
        </div>

        <div class="row">
            <?php
            $search = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($conn, $search);
            if ($res && mysqli_num_rows($res)) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image = $rows['image_name'];
                    $desc = $rows['description'];
                    $price = $rows['price'];
            ?>
                    <div class="col-md-4 food-card m-1">
                        <div class="food-img">
                            <img src="<?php echo $siteUrl . "images/food/" . $image ?>" class="card-img-top w-100 object-fit-cover" style="height: 200px;" alt="Food Category">
                        </div>
                        <div class="food-info">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $desc; ?></p>
                            <div class="food-price">
                                <span class="price">₹<?php echo $price; ?></span>
                                <button class="add-to-cart">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }else{
                $message = "Your search is not found.\\nTry again.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
                ?>
        </div>
    </div>
</section>

<?php include("partials-front/footer.php") ?>