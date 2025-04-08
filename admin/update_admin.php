<?php
require_once("partials/header.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

$sql = "SELECT * from tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);
if ($res == true) {
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);

        $fullName = $rows['full_name'];
        $userName = $rows['username'];

    }
}
?>

<body>
    <h4 class="text-center m-4">Update Admin</h4>
    <form action="" method="post">
        <div class="container w-50 h-80">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" value="<?php echo $fullName ?>" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="<?php echo $userName ?>" required="required">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Update admin">
        </div>
    </form>
</body>



<?php
if (isset($_POST['submit'])) {

    $fullName = $_POST['fullname'];
    $userName = $_POST['username'];

    $sql = "UPDATE `tbl_admin` SET full_name = '$fullName' , username = '$userName' WHERE id =$id;";
    $res = mysqli_query($conn, $sql);


    if ($res == true) {
        $_SESSION['update'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
  Admin Updated Successfully!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("Location:"  .$siteUrl. 'admin/manage_admin.php');
    } else {
        $_SESSION['update'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Admin not update!!!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location:" .$siteUrl. 'admin/manage_admin.php');
    }
}

?>




<?php
require("partials/footer.php");
?>