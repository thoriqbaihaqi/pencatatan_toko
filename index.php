<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">

<div class="header">
    <h1>Toko ABB</h1>
    <p>Dashboard Admin</p>
</div>

<ul>
    <li><a href="barang/index.php">Data Barang</a></li>
    <li><a href="barang_masuk.php">Barang Masuk</a></li>
    <li><a href="barang_keluar.php">Barang Keluar</a></li>
</ul>

<br>
<a href="auth/logout.php">Logout</a>
    </div>

</body>
</html>