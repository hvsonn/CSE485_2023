<?php 
class Category{
    public $matheloai;
    public $tentheloai;
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
}
?>