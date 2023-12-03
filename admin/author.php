<?php
include("./model/author.php");
if(isset($_GET["action"])){

    if($_GET["action"] == "add"){
        $tentacgia = (isset($_POST["tentacgia"])) ? $_POST["tentacgia"] : "";
        $author = new Author("",$tentacgia,"");
        try{
            $author->themtacgia();
            header("Location: ../admin/view/author.php");
        }catch(Exception $e)
        {
                echo "".$e->getMessage()."";
        }

    }

    if($_GET["action"] == "edit"){
        $matacgia = (isset($_POST["matacgia"])) ? $_POST["matacgia"] : "";
        $tentacgia = (isset($_POST["tentacgia"])) ? $_POST["tentacgia"] : "";
        try{
            $tacgia = new author($matacgia, $tentacgia,"");
            $tacgia->suatacgia($matacgia);
            header("Location: ../admin/view/author.php");

        }
        catch(Exception $e){
        echo "".$e->getMessage()."";
        }
    }

    if($_GET["action"] == "delete"){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        try{
            $author = new author($id,"","");
            $author->xoatacgia($id);
            header("Location: ../admin/view/author.php");

        }
        catch(Exception $e){
        echo "".$e->getMessage()."";
        }
    }
}
?>