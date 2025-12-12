<?php
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$pesan = $_POST['pesan'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Buku Tamu</title>
</head>

<body>
    <h1>Data Buku Tamu</h1>
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Pesan:</strong> <?php echo nl2br(htmlspecialchars($pesan)); ?></p>
    <p><a href="bukutamu.html">Kembali ke Buku Tamu</a></p>
    <p><a href="index.html">Kembali ke Menu</a></p>
</body>

</html>