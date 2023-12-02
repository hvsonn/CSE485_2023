<?php
class Author{
    public $matacigia;
    public $tentacgia;
    public $hinhtacgia;
    public function __construct($matacigia, $tentacgia, $hinhtacgia){
        $this->matacigia=$matacigia;
        $this->tentacgia=$tentacgia;
        $this->hinhtacgia=$hinhtacgia;

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