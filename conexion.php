<?php
$host = "localhost";
$user = "root";
$password = "123456";
$dbname   = "aulavirtual";
//$empresa  = 1;
$link     = mysqli_connect($host,$user,$password,$dbname);
mysqli_set_charset($link, "utf8");
?>