<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <!-- bootstrap css  -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <!-- Header Section -->
    <?php include("partials-front/header.php") ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
        <div class="container w-50 m-auto p-5">
        <form class="d-flex" role="search" action="<?php echo $siteUrl; ?>food_search.php" method="post">
            <input class="form-control me-2" type="search" name="search"placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
            <div class="hero-content">
                <h1>Delicious Food Delivered To Your Doorstep</h1>
                <p>Order from your favorite restaurants with just a few clicks and enjoy fresh, hot meals in no time.</p>
                <a href="#food-menu" class="btn">Order Now</a>
            </div>
        </div>
    </section>

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}

?>

<!-- Categories Section -->
<section class="categories" id="categories">
    <div class="container">
        <div class="section-title text-center">
            <h2>Food Categories</h2>
            <p>Explore our wide variety of delicious food categories</p>
        </div>

        <div class="row">
            <?php
            $sql = 'SELECT id,title,image_name FROM tbl_category WHERE active="Yes" Limit 4';
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

    <!-- Food Menu Section -->
    <section class="food-menu" id="food-menu">
        <div class="container">
            <div class="section-title">
                <h2>Our Popular Dishes</h2>
                <p>Browse through our most ordered menu items</p>
            </div>

            <div class="row">
                <?php
                $sql = 'SELECT id,title,image_name,description,price FROM tbl_food WHERE active="Yes" AND featured="Yes"';
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

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Have questions or feedback? We'd love to hear from you!</p>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Get in Touch</h3>
                    <p><i>📍</i> 123 Food Street, Cityville, FC 12345</p>
                    <p><i>📞</i> (123) 456-7890</p>
                    <p><i>✉️</i> info@foodexpress.com</p>
                    <p><i>⏰</i> Open daily from 10:00 AM to 10:00 PM</p>
                </div>
                <div class="contact-form">
                    <form>
                        <input type="text" placeholder="Your Name" required>
                        <input type="email" placeholder="Your Email" required>
                        <input type="text" placeholder="Subject">
                        <textarea placeholder="Your Message" required></textarea>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include("partials-front/footer.php") ?>


</body>

</html>

</html>