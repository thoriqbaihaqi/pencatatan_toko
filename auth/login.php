<?php
session_start();
include "../config/koneksi.php";

$error = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM admin 
         WHERE username='$username' 
         AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['login'] = true;
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <!-- LINK CSS (INI YANG SEBELUMNYA TIDAK ADA) -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="login-box">

    <h2>Login Admin</h2>

    <?php if ($error != "") { ?>
        <p style="color:red; text-align:center;">
            <?php echo $error; ?>
        </p>
    <?php } ?>

    <form method="post">
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>

</div>

</body>
</html>