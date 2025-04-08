<?php require("credentials/config.php"); ?>

<?php
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background Styling */
        body {
            background: url('images/bg3.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Form Container Styling */
        .login-container {
            background: rgba(255, 255, 255, 0.7);
            /* Semi-transparent White */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="login-container">
                <h3 class="text-center text-primary mb-4">Login</h3>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="forgot-password.php" class="text-decoration-none ">Forgot Password?</a>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Login</button>
                </form>
                <p class="text-center mt-3">
                    Don't have an account? <a href="register.php" class="text-decoration-none">Register</a>
                </p>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT id,customer_email,password FROM users where customer_email='$email' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        if ($res && mysqli_num_rows($res) == 1) {
            $id = mysqli_fetch_assoc($res)['id'];
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["u_id"] = $id;
            $_SESSION["username"] = $username;

            header("location:" . $siteUrl);
        } else {
            $_SESSION['login'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    password or email is incorrect!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>