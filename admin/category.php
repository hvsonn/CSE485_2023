<?php
include("./model/category.php");
if(isset($_GET["action"])){

    if($_GET["action"] == "add"){
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";
        $author = new Category("", $tentheloai);
        $author->themtheloai();
        header("Location: ../admin/view/category.php");
        
    }

    if($_GET["action"] == "edit"){
        $matheloai = (isset($_POST["matheloai"])) ? $_POST["matheloai"] : "";
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";
        $author = new Category($matheloai, $tentheloai);
        $author->suatheloai($matheloai);
        header("Location: ../admin/view/category.php");
    }

    if($_GET["action"] == "delete"){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        try{
            $author = new Category($id,"");
            $author->xoatheloai($id);
            header("Location: ../admin/view/category.php");
        }
        catch(Exception $e){
             echo "". $e->getMessage() ."";
        }

    }
}
?>