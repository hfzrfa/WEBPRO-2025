<?php
require 'koneksi.php';

$sql    = "SELECT id, username, created_at FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Pengguna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .card-shadow {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .table thead th {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h3 class="mb-0">Daftar Pengguna</h3>
                            <small class="text-muted">Data dari tabel <code>users</code></small>
                        </div>
                        <div>
                            <a href="register.php" class="btn btn-primary btn-sm">
                                + Tambah Pengguna
                            </a>
                        </div>
                    </div>

                    <?php if (isset($_GET['msg'])): ?>
                        <div class="alert alert-info py-2">
                            <?= htmlspecialchars($_GET['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="card card-shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 70px;">ID</th>
                                            <th>Username</th>
                                            <th style="width: 220px;">Dibuat Pada</th>
                                            <th style="width: 120px;" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($result && mysqli_num_rows($result) > 0): ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                                    <td>
                                                        <?= date('d-m-Y H:i', strtotime($row['created_at'])); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a
                                                            href="delete_user.php?id=<?= $row['id']; ?>"
                                                            class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Yakin mau hapus pengguna ini?');">
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">
                                                    Belum ada data pengguna.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <p class="text-center text-muted small mt-3 mb-0">
                        &copy; <?= date('Y'); ?> Praktikum Web – Contoh Aplikasi PHP & MySQL
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
if ($result) {
    mysqli_free_result($result);
}
mysqli_close($conn);
