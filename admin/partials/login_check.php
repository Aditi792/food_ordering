<?php

if(!isset($_SESSION['user'])){

    $_SESSION['no-login-msg']='<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
    Admin logged out Successfully!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

    header("location:"."login.php");
}
?>