<?php
$conn = mysqli_connect("localhost", "root", "", "web_crud");

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();
