<?php
session_start();
require_once 'Mahasiswa.php';

if (!isset($_SESSION['data_mahasiswa'])) {
    $_SESSION['data_mahasiswa'] = [];
}

if (isset($_POST['submit'])) {
    $nama   = $_POST['nama']   ?? '';
    $nim    = $_POST['nim']    ?? '';
    $nohp   = $_POST['nohp']   ?? '';
    $alamat = $_POST['alamat'] ?? '';

    if (!empty($nama) && !empty($nim)) {
        $mhs = new Mahasiswa($nama, $nim, $nohp, $alamat);
        $_SESSION['data_mahasiswa'][] = $mhs->getData();
    }
}

if (isset($_GET['clear'])) {
    session_unset();
    session_destroy();
}

header("Location: index.php");
exit;
?>