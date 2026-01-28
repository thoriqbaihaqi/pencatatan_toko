<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id'");

header("Location: index.php");
exit;