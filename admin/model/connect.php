<?php
$server   = "localhost";   
<<<<<<< HEAD
$dbname   = "BTTH01_CSE485";     
=======
$dbname   = "btth01_cse485";     
>>>>>>> 8bc95d58f9632a6ad1f9b50e5df5a55f9952e4d6
$username = "root";
$password = "";     

$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    die("Lỗi kết nối :" . mysqli_connect_error());
}
?>