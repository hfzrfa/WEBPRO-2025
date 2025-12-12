<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($username === '' || $password === '') {
    header('Location: register.php?msg=Username dan password wajib diisi');
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql  = "INSERT INTO users (username, password, created_at) VALUES (?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header('Location: register.php?msg=Gagal menyiapkan query');
    exit;
}

mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: register.php?msg=Registrasi berhasil');
    exit;
}

$error = mysqli_error($conn);
mysqli_stmt_close($stmt);
mysqli_close($conn);

header('Location: register.php?msg=Registrasi gagal: ' . urlencode($error));
exit;
