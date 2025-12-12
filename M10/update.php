<?php
require "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = (int)($_POST["id"] ?? 0);
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if ($id <= 0 || $name === "" || $email === "") {
    die("Input tidak valid.");
}

if ($password !== "") {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=?, password=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $hash, $id);
} else {
    $stmt = mysqli_prepare($conn, "UPDATE users SET name=?, email=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);
}

mysqli_stmt_execute($stmt);
header("Location: index.php");
exit;
