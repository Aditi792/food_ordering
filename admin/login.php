<?php
require("../credentials/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- bootstrap css  -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>

<?php
if (isset($_SESSION['login'])) {
    echo $_SESSION["login"];
    unset($_SESSION["login"]);
}

if (isset($_SESSION['no-login-msg'])) {
    echo $_SESSION["no-login-msg"];
    unset($_SESSION["no-login-msg"]);
}
?>

<body>
    <div class="container bg-info my-5 p-5">
        <h4 class="text-center ">Admin Login</h4>
        <form action="" method="post">
            <div class="container w-50 h-80">
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="text-center m-2"> <input type="submit" class="btn btn-primary m-2" name="submit" value="Login"></div>
               
            </div>

        </form>
    </div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {

    $userName = $_POST['username'];
    $Password = md5($_POST['password']);

    $sql = "SELECT username,password from tbl_admin WHERE username='$userName' AND password='$Password'";
    $res = mysqli_query($conn, $sql);


    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
  Admin Login Successfully!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        $_SESSION['user'] = $userName;
        header("location:" . 'index.php');
    } else {
        $message = "Username or Password is incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}


?>