<?php
$dbhost ="localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Northwind";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_error()){
    die("Database connection failed: " .mysqli_connect_error() ."(" .mysqli_connect_errno() .")");
    echo "Connection Failed";
}
?>