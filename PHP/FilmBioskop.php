<?php
class FilmBioskop {
    private $id;
    private $judul;
    private $genre;
    private $hargaTiket;
    private $gambar;

    public function __construct($id="", $judul="", $genre="", $hargaTiket=0, $gambar="") {
        $this->id = $id;
        $this->judul = $judul;
        $this->genre = $genre;
        $this->hargaTiket = $hargaTiket;
        $this->gambar = $gambar;
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getJudul() { return $this->judul; }
    public function setJudul($judul) { $this->judul = $judul; }

    public function getGenre() { return $this->genre; }
    public function setGenre($genre) { $this->genre = $genre; }

    public function getHargaTiket() { return $this->hargaTiket; }
    public function setHargaTiket($hargaTiket) { $this->hargaTiket = $hargaTiket; }

    public function getGambar() { return $this->gambar; }
    public function setGambar($gambar) { $this->gambar = $gambar; }
}
?>