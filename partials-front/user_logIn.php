<?php
require("credentials/config.php");

if(!isset($_SESSION["username"])){
    header("loaction:".$siteUrl."login.php");
}


?>