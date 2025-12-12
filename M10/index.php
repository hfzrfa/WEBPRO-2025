<?php
require "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$q = mysqli_query($conn, "SELECT id, name, email FROM users ORDER BY id DESC");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Users</title>
</head>

<body>
    <p>Login sebagai: <?= htmlspecialchars($_SESSION["user_name"] ?? "User") ?> |
        <a href="logout.php">Logout</a>
    </p>

    <h2>Data Users</h2>
    <a href="create.php">Tambah User</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($q)): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= htmlspecialchars($row["name"]) ?></td>
                    <td><?= htmlspecialchars($row["email"]) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row["id"] ?>">Edit</a> |
                        <a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>