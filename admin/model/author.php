<?php
class Author{
    private $matacigia;
    private $tentacgia;
    private $hinhtacgia;
    public function __construct($matacigia, $tentacgia, $hinhtacgia){
        $this->matacigia=$matacigia;
        $this->tentacgia=$tentacgia;
        $this->hinhtacgia=$hinhtacgia;
    }
    public function getMatacigia(){
        return $this->matacigia;
    }
    public function gettentacgia(){
        return $this->tentacgia;
    }
    public function getHinhtacgia(){
        return $this->hinhtacgia;
    }
    public function themtacgia(){
        include("model/connect.php");
        $tentacgia = (isset($_POST["tentacgia"])) ? $_POST["tentacgia"] : "";

        $sql = "INSERT INTO tacgia (ten_tgia) VALUES ('" . $tentacgia ."')";
        $connect->query($sql);
        header("Location: ../admin/view/author.php");
    }

    public function suatacgia($id){
        include("model/connect.php");
        $tentacgia = (isset($_POST["tentacgia"])) ? $_POST["tentacgia"] : "";
        $sql = "UPDATE tacgia SET ten_tgia='" . $tentacgia  . "' WHERE ma_tgia=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/author.php");
    }
    public function xoatacgia($id){
        include("model/connect.php");
        $sql = "DELETE FROM tacgia WHERE ma_tgia=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/author.php");
    }
}
?>