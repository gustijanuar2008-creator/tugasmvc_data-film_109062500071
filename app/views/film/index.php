<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Film</title>
    <!-- Bootstrap 5 CDN & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
        .table header { background-color: #212529; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0 text-dark">🎬 Katalog Film</h2>
                    <p class="text-muted small mb-0">Kelola daftar film favorit kamu dengan mudah</p>
                </div>
                <a href="index.php?page=film&action=create" class="btn btn-primary px-3 shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Film
                </a>
            </div>

            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" style="width: 60px;">No</th>
                                <th>Judul Film</th>
                                <th>Sutradara</th>
                                <th>Genre</th>
                                <th>Tahun</th>
                                <th>Durasi</th>
                                <th class="text-center" style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($film)): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada data film.</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; foreach ($film as $f): ?>
                                <tr>
                                    <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                                    <td class="fw-semibold text-dark"><?= htmlspecialchars($f['judul']) ?></td>
                                    <td><?= htmlspecialchars($f['sutradara']) ?></td>
                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary border fw-normal px-2 py-1">
                                            <?= htmlspecialchars($f['genre']) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($f['tahun_rilis']) ?></td>
                                    <td><?= htmlspecialchars($f['durasi_menit']) ?> menit</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex gap-1">
                                            <a href="index.php?page=film&action=edit&id=<?= $f['id'] ?>" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form method="post" action="index.php?page=film&action=delete" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                                <input type="hidden" name="id" value="<?= $f['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>