<?php
require("partials/header.php");

if (isset($_GET['id']) and isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../images/category/" . $image_name;

        if (file_exists($path)) {
            $remove = unlink($path);
        } else {
            $remove = true; // File doesn't exist, proceed with deletion
        }

        if ($remove == false) {
            $_SESSION['remove'] = '<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
    Failed to Remove Category Image.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
            //REdirect to Manage Category page
            header('location:'.$siteUrl.'admin/manage_category.php');
            //Stop the Process
            exit;
        }
    }
    

    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql)or die(mysqli_error($conn));

    if ($res == true) {
        $_SESSION['delete'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Category Deleted Successfully!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
        header('location:'.$siteUrl. 'admin/manage_category.php');
    } else {
        $_SESSION['delete'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Failed to Delete Category!!!.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header('location:'.$siteUrl.'admin/manage_category.php');
    }
}else{
    header("location:".$siteUrl.'admin/manage_category.php');
}


require("partials/footer.php");
?>
