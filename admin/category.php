<?php
include("model/connect.php");

if(isset($_GET["action"])){

    if($_GET["action"] == "add"){
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";

        $sql = "INSERT INTO theloai (ten_tloai) VALUES ('" . $tentheloai ."')";
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }

    if($_GET["action"] == "edit"){
        $matheloai = (isset($_POST["matheloai"])) ? $_POST["matheloai"] : "";
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";

        $sql = "UPDATE theloai SET ten_tloai='" . $tentheloai . "' WHERE ma_tloai=" . $matheloai;
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }

    if($_GET["action"] == "delete"){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";

        $sql = "DELETE FROM theloai WHERE ma_tloai=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }
}
?>