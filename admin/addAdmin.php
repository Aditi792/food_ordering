<?php require("partials/header.php"); ?>


<body>
    <h4 class="text-center m-4">Admin Login</h4>
    <form action="" method="post">
        <div class="container w-50 h-80">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Add admin">
        </div>

    </form>
</body>


<?php

if (isset($_POST['submit'])) {

    $fullName = $_POST['fullname'];
    $userName = $_POST['username'];
    $Password = md5($_POST['password']);

    $sql = "INSERT INTO `tbl_admin` (`full_name`, `username`, `password`) VALUES ('$fullName', '$userName ', '$Password');";
    $res = mysqli_query($conn, $sql);


    if ($res == true) {
        $_SESSION['add'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
  Admin added Successfully!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("Location:".'manage_admin.php');
    }else{
        $_SESSION['add'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Admin not added!!!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
              header("Location:".'manage_admin.php');
    }
}

?>


<?php require("partials/footer.php"); ?>