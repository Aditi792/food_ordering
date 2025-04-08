<?php require("credentials/config.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background Image */
        body {
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Form Container Styling */
        .register-container {
            background: rgba(245, 220, 197, 0.9);
            /* Light white background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['login-not-sec'])) {
        echo $_SESSION['login-not-sec'];
        unset($_SESSION['login-not-sec']);
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-container">
                    <div class="card-header bg-primary text-white text-center p-2 rounded mb-2">
                        <h4 >Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="customer_email" class="form-label">Customer Email</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                            </div>
                            <div class="mb-3">
                                <label for="customer_contact" class="form-label">Customer Contact</label>
                                <input type="tel" class="form-control" id="customer_contact" name="customer_contact" required minlength="10" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <label for="customer_address" class="form-label">Customer Address</label>
                                <textarea class="form-control" id="customer_address" name="customer_address" rows="3" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        // $customer_name = $_POST['customer_name'];
        // $customer_email = $_POST['customer_email'];
        // $customer_contact = $_POST['customer_contact'];
        // $customer_address = $_POST['customer_address'];


        // Retrieve form data and prevent SQL injection
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5($_POST['password']); // Use password_hash() for better security
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
        $customer_contact = mysqli_real_escape_string($conn, $_POST['customer_contact']);
        $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);

        $sql = "  INSERT INTO users (username, password, customer_name, customer_email, customer_contact, customer_address) 
        VALUES ('$username', '$password', '$customer_name', '$customer_email','$customer_contact', '$customer_address')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $_SESSION["login-sec"] = "<div>user login successfull.</div>";
            header("location:" . $siteUrl . "index.php");
        } else {
            $_SESSION["login-not-sec"] = "<div>user login successfull.</div>";
            header("location:" . $siteUrl);
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>