<?php require("../credentials/config.php");
require("login_check.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Page</title>
  <!-- bootstrap css  -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <nav
    class="navbar navbar-expand-lg bg-body-tertiary sticky-top top-0"
    style="background-color:rgb(223, 219, 213)">
    <div class="container-fluid p-2" style="background-color:rgb(243, 222, 191)">
      <a class="navbar-brand" href="#">FavFood</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php $siteUrl ?>index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php $siteUrl ?>manage_admin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php $siteUrl ?>manage_category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php $siteUrl ?>manage_food.php">Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php $siteUrl ?>manage_order.php">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php $siteUrl ?>logout.php">Log out</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </nav>