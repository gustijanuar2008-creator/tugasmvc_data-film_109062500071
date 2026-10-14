<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h4 class="fw-bold mb-3"><i class="bi bi-pencil-square text-warning me-2"></i>Edit Data Film</h4>
                <hr class="mb-4">

                <form method="post" action="index.php?page=film&action=update">
                    <input type="hidden" name="id" value="<?= $film['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Film</label>
                        <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($film['judul']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sutradara</label>
                        <input type="text" name="sutradara" class="form-control" value="<?= htmlspecialchars($film['sutradara']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Genre</label>
                        <input type="text" name="genre" class="form-control" value="<?= htmlspecialchars($film['genre']) ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tahun Rilis</label>
                            <input type="number" name="tahun_rilis" class="form-control" value="<?= htmlspecialchars($film['tahun_rilis']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Durasi (Menit)</label>
                            <input type="number" name="durasi_menit" class="form-control" value="<?= htmlspecialchars($film['durasi_menit']) ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="index.php?page=film" class="btn btn-light border"><i class="bi bi-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-warning px-4"><i class="bi bi-check-circle me-1"></i> Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>