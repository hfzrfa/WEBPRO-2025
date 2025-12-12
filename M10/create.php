<?php
require "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tambah User</title>
</head>

<body>
    <h2>Tambah User</h2>

    <form action="store.php" method="post">
        <label>Nama</label><br>
        <input type="text" name="name" maxlength="50" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" maxlength="100" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" minlength="6" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>

</html>