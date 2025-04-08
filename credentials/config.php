<?php


session_start();

$siteUrl = 'http://localhost/food_ordering/';
$db_sever = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "food-order";
try{
    $conn = mysqli_connect($db_sever,$db_user,$db_pass,$db_name) ;
}catch(mysqli_sql_exception){
    echo"Database not connected";
}

?>