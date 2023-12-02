<?php
include("./model/category.php");
if(isset($_GET["action"])){

    if($_GET["action"] == "add"){
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";
        $category = new Category("", $tentheloai);
        $category->themtheloai();
        header("Location: ../admin/view/category.php");
    }

    if($_GET["action"] == "edit"){
        $matheloai = (isset($_POST["matheloai"])) ? $_POST["matheloai"] : "";
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";
        $category = new Category($matheloai, $tentheloai);
        $category->suatheloai($matheloai);
        header("Location: ../admin/view/category.php");
    }

    if($_GET["action"] == "delete"){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $category = new Category($id,"");
        $category->xoatheloai($id);
        header("Location: ../admin/view/category.php");
    }
}
?>