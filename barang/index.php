<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
</head>
<body>
    <div class="container">

<h2>Data Barang</h2>

<a href="../index.php">Kembali ke Dashboard</a>
<br><br>

<a href="tambah.php">+ Tambah Barang</a>

<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama_barang']; ?></td>
        <td><?php echo $row['satuan']; ?></td>
        <td><?php echo $row['stok']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id_barang']; ?>">Edit</a> |
            <a href="hapus.php?id=<?php echo $row['id_barang']; ?>"
               onclick="return confirm('Yakin ingin menghapus barang ini?');">
               Hapus
            </a>
        </td>
    </tr>
    <?php } ?>
</table>
    </div>
</body>
</html>