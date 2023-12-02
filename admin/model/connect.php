<?php
$server   = "localhost";   
$dbname   = "btth01_cse485";     
$username = "root";
$password = "";     

$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    die("Lỗi kết nối :" . mysqli_connect_error());
}
?>