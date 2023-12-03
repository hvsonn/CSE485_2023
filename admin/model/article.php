<?php
class Article{
    public $mabaiviet;
    public $tieude;
    public $tenbaihat;
    public $matheloai;
    public $tomtat;
    public $noidung;
    public $matacgia;
    public $ngayviet;
    public $hinhanh;
    public function __construct($mabaiviet,$tieude,$tenbaihat,$matheloai,$tomtat,$noidung,$matacgia,$ngayviet,$hinhanh){
        $this->mabaiviet=$mabaiviet;
        $this->tieude=$tieude;
        $this->tenbaihat=$tenbaihat;
        $this->matheloai=$matheloai;
        $this->tomtat=$tomtat;
        $this->noidung=$noidung;
        $this->matacgia=$matacgia;
        $this->ngayviet=$ngayviet;
        $this->hinhanh=$hinhanh;
    }

    public function thembaiviet(){
        include("model/connect.php");

        $sql = "INSERT INTO baiviet (tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) 
        VALUES ('" . $this->tieude ."'" . ",'" .  $this->tenbaihat . "'" . "," .  $this->matheloai . "" .",'" .  $this->tomtat . "'" . ",'" 
        .  $this->noidung . "'" . "," .  $this->matacgia . ",'" .  $this->ngayviet . "'" . ",'" .  $this->hinhanh . "')";
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }

    public function suabaiviet($id){
        include("model/connect.php");

        $sql = "UPDATE baiviet SET "
        ."tieude='" . $this->tieude . "'"
        .",ten_bhat='" . $this->tenbaihat . "'"
        .",ma_tloai='" . $this->matheloai . "'"
        .",tomtat='" . $this->tomtat . "'"
        .",noidung='" .  $this->noidung . "'"
        .",ma_tgia='" . $this->matacgia . "'"
        .",ngayviet='" . $this->ngayviet . "'"
        .",hinhanh='" . $this->hinhanh . "'"
        ." WHERE ma_bviet=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }
    public function xoabaiviet($id){
        include("model/connect.php");

        $sql = "DELETE FROM baiviet WHERE ma_bviet=" . $id;
        $connect->query($sql);
        header("Location: ../admin/view/category.php");
    }
}
?>