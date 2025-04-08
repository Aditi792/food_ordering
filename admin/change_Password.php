<?php
require_once("partials/header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>


<?
if (isset($_SESSION['pass-not-match'])) {
    echo $_SESSION['pass-not-match'];
    unset($_SESSION['pass-not-match']);
}
?>

<body>
    <h4 class="text-center m-4">Update Admin</h4>
    <form action="" method="post">
        <div class="container w-50 h-80">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Current Password</label>
                <input type="text" name="crntPass" class="form-control" id="exampleInputEmail1" value="" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">New Password</label>
                <input type="text" name="newPass" class="form-control" id="exampleInputEmail1" value="" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="text" name="conPass" class="form-control" id="exampleInputEmail1" value="" required="required">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Change Password">
        </div>
    </form>
</body>


<?php

if (isset($_POST["submit"])) {

    $current_password = md5($_POST['crntPass']);
    $new_password = md5($_POST['newPass']);
    $confirm_password = md5($_POST['conPass']);

    $sql = "SELECT * FROM tbl_admin where id =$id AND password = '$current_password'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            if ($new_password == $confirm_password) {
                $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = $id";
                $res2 = mysqli_query($conn, $sql);
                if ($res2) {
                    $_SESSION['chng-pass'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
                                                Admin password changed Successfully!!!.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                    header("location:" . 'manage_admin.php');
                } else {
                    $_SESSION['pass-not-match'] = '<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
                                                failed to change password.try again!.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                    header("location:" . '');
                }
            } else {
                $_SESSION['pass-not-match'] = '<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
                Password did not match!!!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                header("location:" . '');
            }
        } else {
            $_SESSION['pass-not-match'] = '<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
  User not found!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
            header("location:" . '');
        }
    }
}

?>

<?php
require("partials/footer.php");
?>