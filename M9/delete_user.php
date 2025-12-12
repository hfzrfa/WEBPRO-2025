<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
    mysqli_close($conn);
    header('Location: list_users.php?msg=ID pengguna tidak ditemukan');
    exit;
}

$id = (int) $_GET['id'];

$sql  = "DELETE FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    mysqli_close($conn);
    header('Location: list_users.php?msg=Gagal menyiapkan query hapus');
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: list_users.php?msg=Pengguna berhasil dihapus');
    exit;
}

$error = mysqli_error($conn);
mysqli_stmt_close($stmt);
mysqli_close($conn);

header('Location: list_users.php?msg=Gagal menghapus pengguna: ' . urlencode($error));
exit;
