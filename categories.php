<?php include("partials-front/header.php") ?>

<!-- Categories Section -->
<section class="categories" id="categories">
    <div class="container">
        <div class="section-title text-center">
            <h2>Food Categories</h2>
            <p>Explore our wide variety of delicious food categories</p>
        </div>

        <div class="row">
            <?php
            $sql = 'SELECT id,title,image_name FROM tbl_category WHERE active="Yes"';
            $res = mysqli_query($conn, $sql);
            if ($res && mysqli_num_rows($res)) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image = $rows['image_name'];
            ?>   
               
                <div class="col-md-3 mb-4">
                <a href="<?php echo $siteUrl; ?>category_food_search.php?id=<?php echo $id; ?>"  style="text-decoration: none;">   
                    <div class="card category-card">
                        <img src="<?php echo $siteUrl . "images/category/" . $image ?>" class="card-img-top w-100 object-fit-cover" style="height: 200px;" alt="Food Category">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $title; ?></h5>
                        </div>
                    </div>
                    </a>
                </div>
  
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php include("partials-front/footer.php") ?>
