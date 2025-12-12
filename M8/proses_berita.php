<?php
$judul = $_POST['judul'] ?? '';
$isi = $_POST['isi'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Berita Terkirim</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Berita Terkirim</h1>
    <h2><?php echo htmlspecialchars($judul); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($isi)); ?></p>

    <a href="form_berita.html">Kembali</a>
    <a href="index.html">Menu Utama</a>
</body>

</html>