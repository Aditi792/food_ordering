<?php require("user_logIn.php") ?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>
  <!-- Header Section -->
  <header>
    <div class="container header-container">
      <div class="logo">Food<span>Express</span></div>
      <nav>
        <ul>
          <li><a href="<?php $siteUrl; ?>index.php">Home</a></li>
          <li><a href="<?php $siteUrl; ?>categories.php">Categories</a></li>
          <li><a href="<?php $siteUrl; ?>menu.php">Food Menu</a></li>
          <li><a href="<?php $siteUrl; ?>contact.php">Contact</a></li>
          <li>
            <?php
            if (empty($_SESSION["u_id"])) {
              echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>';
            } else {
              echo  '<li class="nav-item"><a href="myorders.php" class="nav-link active">Myorders</a> </li>';
              echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
            }
            ?>
          </li>
        </ul>
      </nav>
    </div>
  </header>