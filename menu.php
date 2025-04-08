<?php include("partials-front/header.php") ?>

<!-- Food Menu Section -->
<section class="food-menu" id="food-menu">
    <div class="container">
        <div class="section-title">
            <h2>Our Popular Dishes</h2>
            <p>Browse through our most ordered menu items</p>
        </div>

        <div class="row">
            <?php
            $sql = 'SELECT id,title,image_name,description,price FROM tbl_food WHERE active="Yes"';
            $res = mysqli_query($conn, $sql);
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
                                <a class="add-to-cart text-decoration-none" name="addtocart" href="<?php echo $siteUrl; ?>order.php?food_id=<?php echo $id; ?>">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
                ?>
        </div>
    </div>
</section>

<?php include("partials-front/footer.php") ?>