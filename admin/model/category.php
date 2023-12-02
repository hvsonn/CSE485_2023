<?php 
class Category{
    private $matheloai;
    private $tentheloai;
    public function __construct($matheloai, $tentheloai){
        $this->matheloai = $matheloai;
        $this->tentheloai = $tentheloai;
    }
    public function getmatheloai(){
        return $this->matheloai;
    }
    public function gettentheloai(){
        return $this->tentheloai;
    }

    public function settheloai($tentheloai){
        $this->tentheloai = $tentheloai;
    }

    public function themtheloai(){
        include("model/connect.php");
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";

        $sql = "INSERT INTO theloai (ten_tloai) VALUES ('" . $tentheloai ."')";
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }

    public function suatheloai($id){
        include("model/connect.php");
        $tentheloai = (isset($_POST["tentheloai"])) ? $_POST["tentheloai"] : "";

        $sql = "UPDATE theloai SET ten_tloai='" . $tentheloai . "' WHERE ma_tloai=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }
    public function xoatheloai($id){
        include("model/connect.php");

        $sql = "DELETE FROM theloai WHERE ma_tloai=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }
}
?>