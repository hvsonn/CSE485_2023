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

}
?>