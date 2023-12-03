<?php
include("./model/article.php");
if(isset($_GET["action"])){

    if($_GET["action"] == "add"){
        $tieude = (isset($_POST["tieude"])) ? $_POST["tieude"] : "";
        $tenbaihat = (isset($_POST["tenbaihat"])) ? $_POST["tenbaihat"] : "";
        $matheloai = (isset($_POST["matheloai"])) ? $_POST["matheloai"] : "";
        $tomtat = (isset($_POST["tomtat"])) ? $_POST["tomtat"] : "";
        $noidung = (isset($_POST["noidung"])) ? $_POST["noidung"] : "";
        $matacgia = (isset($_POST["matacgia"])) ? $_POST["matacgia"] : "";
        $ngayviet = date("Y-m-d");
        $hinhanh = (isset($_POST["hinhanh"])) ? $_POST["hinhanh"] : "";

        $article = new Article("", $tieude, $tenbaihat, $matheloai, $tomtat, $noidung, $matacgia, $ngayviet, $hinhanh);
        $article->thembaiviet();
        header("Location: ../admin/view/article.php");
    }

    if($_GET["action"] == "edit"){
        $id = (isset($_POST["id"])) ? $_POST["id"] : "";

        $tieude = (isset($_POST["tieude"])) ? $_POST["tieude"] : "";
        $tenbaihat = (isset($_POST["tenbaihat"])) ? $_POST["tenbaihat"] : "";
        $matheloai = (isset($_POST["matheloai"])) ? $_POST["matheloai"] : "";
        $tomtat = (isset($_POST["tomtat"])) ? $_POST["tomtat"] : "";
        $noidung = (isset($_POST["noidung"])) ? $_POST["noidung"] : "";
        $matacgia = (isset($_POST["matacgia"])) ? $_POST["matacgia"] : "";
        $ngayviet = date("Y-m-d");
        $hinhanh = (isset($_POST["hinhanh"])) ? $_POST["hinhanh"] : "";

        $article = new Article("", $tieude, $tenbaihat, $matheloai, $tomtat, $noidung, $matacgia, $ngayviet, $hinhanh);
        $article->suabaiviet($id);
        header("Location: ../admin/view/article.php");
    }

    if($_GET["action"] == "delete"){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
echo $id;
        $article = new Article($id, "", "", "", "", "", "","", "");
        $article->xoabaiviet($id);
        header("Location: ../admin/view/article.php");
    }
}
?>