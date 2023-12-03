<?php 
    include("./view/login.php");
    session_start();
    include("connect.php");
    $sql = "SELECT * FROM users";
    $result = $connect->query($sql);
    $users = [];
    while ($row = $result->fetch_assoc()) { $users[] = $row; }

    $username = isset($_POST["username"]) ? $_POST["username"] :"";
    $password = isset($_POST["password"]) ? $_POST["password"] :"";

    var_dump($username, $password);
    var_dump($users);

    foreach ($users as $user) {
        if ((isset($user["namw"]) && strcmp($user["namw"], $username) == 0) || (isset($user["email"]) && strcmp($users["email"], $username)==0)) {
            if($user["password"] == $password) {
                header("Location: /index.php");
                $_SESSION["username"] == $username;
            }else{
                header("Location: /login.php");
            }
        }else{
            header("Location: /login.php");
        }
    }
?>