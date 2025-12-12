<?php
require "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = (int)($_GET["id"] ?? 0);
$stmt = mysqli_prepare($conn, "SELECT id, name, email FROM users WHERE id=? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($res);

if (!$user) die("Data tidak ditemukan.");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit User</title>
</head>

<body>
    <h2>Edit User</h2>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $user["id"] ?>">

        <label>Nama</label><br>
        <input type="text" name="name" maxlength="50" value="<?= htmlspecialchars($user["name"]) ?>" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" maxlength="100" value="<?= htmlspecialchars($user["email"]) ?>" required><br><br>

        <label>Password (kosongkan jika tidak diubah)</label><br>
        <input type="password" name="password" minlength="6"><br><br>

        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>

</html>