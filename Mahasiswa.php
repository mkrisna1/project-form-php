<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $nohp;
    public $alamat;
    public $timestamp;

    public function __construct($nama, $nim, $nohp, $alamat) {
        $this->nama      = htmlspecialchars(trim($nama));
        $this->nim       = htmlspecialchars(trim($nim));
        $this->nohp      = htmlspecialchars(trim($nohp));
        $this->alamat    = htmlspecialchars(trim($alamat));
        $this->timestamp = date('d M Y H:i');
    }

    public function getData() {
        return [
            'nama'     => $this->nama,
            'nim'      => $this->nim,
            'nohp'     => $this->nohp,
            'alamat'   => $this->alamat,
            'waktu'    => $this->timestamp
        ];
    }
}
?>