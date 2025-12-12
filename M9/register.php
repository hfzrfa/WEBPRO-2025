<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrasi Pengguna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-shadow {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .brand-title {
            font-weight: 700;
            letter-spacing: 0.08em;
            font-size: 0.8rem;
            text-transform: uppercase;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="auth-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4">
                    <div class="card card-shadow">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <div class="brand-title">Praktikum PHP & MySQL</div>
                                <h4 class="mt-2 mb-0">Registrasi Pengguna</h4>
                                <p class="text-muted small mb-0">Contoh aplikasi sederhana</p>
                            </div>

                            <?php if (isset($_GET['msg'])): ?>
                                <div class="alert alert-info py-2">
                                    <?= htmlspecialchars($_GET['msg']); ?>
                                </div>
                            <?php endif; ?>

                            <form action="proses_register.php" method="post" autocomplete="off">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="username"
                                        name="username"
                                        required
                                        placeholder="Masukkan username">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                        required
                                        placeholder="Masukkan password">
                                </div>

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Daftar
                                    </button>
                                    <a href="list_users.php" class="btn btn-outline-secondary">
                                        Lihat Daftar Pengguna
                                    </a>
                                </div>
                            </form>

                            <p class="text-center text-muted small mt-4 mb-0">
                                &copy; <?= date('Y'); ?> Praktikum Web – PHP & MySQL
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>