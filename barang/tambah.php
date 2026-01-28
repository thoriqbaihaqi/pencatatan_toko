<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];
    $satuan      = $_POST['satuan'];
    $stok        = $_POST['stok'];

    mysqli_query($koneksi,
        "INSERT INTO barang (nama_barang, satuan, stok)
         VALUES ('$nama_barang', '$satuan', '$stok')"
    );

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
</head>
<body>

<h2>Tambah Data Barang</h2>

<form method="post">
    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" required><br><br>

    <label>Satuan</label><br>
    <input type="text" name="satuan" required><br><br>

    <label>Stok</label><br>
    <input type="number" name="stok" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php">Batal</a>
</form>

</body>
</html>