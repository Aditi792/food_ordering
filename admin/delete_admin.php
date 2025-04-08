<?php
require("partials/header.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}


$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == true) {
  $_SESSION['delete'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Admin deleted Successfully!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  header('location:' . 'manage_admin.php');
} else {
  $_SESSION['delete'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Admin not added!!!.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
  header('location:' . 'manage_admin.php');
}



require("partials/footer.php");
