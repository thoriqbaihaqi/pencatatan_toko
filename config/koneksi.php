<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pencatatan_toko";
$port = 3307;

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
