<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $satuan      = $_POST['satuan'];
    $stok        = $_POST['stok'];

    mysqli_query($koneksi,
        "UPDATE barang SET
            nama_barang='$nama_barang',
            satuan='$satuan',
            stok='$stok'
         WHERE id_barang='$id'"
    );

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
</head>
<body>

<h2>Edit Data Barang</h2>

<form method="post">
    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required><br><br>

    <label>Satuan</label><br>
    <input type="text" name="satuan" value="<?php echo $row['satuan']; ?>" required><br><br>

    <label>Stok</label><br>
    <input type="number" name="stok" value="<?php echo $row['stok']; ?>" required><br><br>

    <button type="submit" name="update">Update</button>
    <a href="index.php">Batal</a>
</form>

</body>
</html>