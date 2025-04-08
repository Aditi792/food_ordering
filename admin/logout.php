<?php
require("../credentials/config.php");
session_destroy();
header("location:"."login.php");
?>