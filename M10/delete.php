<?php
require "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = (int)($_GET["id"] ?? 0);
if ($id <= 0) die("ID tidak valid.");

$stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
