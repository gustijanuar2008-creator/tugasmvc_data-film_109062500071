<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Film</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Film</h2>
    <?php require __DIR__ . '/../partials/flash.php'; ?>

    <form method="post" action="index.php?page=film&action=store">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($old['judul'] ?? '') ?>" required>

        <label>Sutradara</label>
        <input type="text" name="sutradara" value="<?= htmlspecialchars($old['sutradara'] ?? '') ?>" required>

        <label>Genre</label>
        <input type="text" name="genre" value="<?= htmlspecialchars($old['genre'] ?? '') ?>" required>

        <label>Tahun Rilis</label>
        <input type="number" name="tahun_rilis" value="<?= htmlspecialchars($old['tahun_rilis'] ?? '') ?>" required>

        <label>Durasi (menit)</label>
        <input type="number" name="durasi_menit" value="<?= htmlspecialchars($old['durasi_menit'] ?? '') ?>" required>

        <button type="submit">Simpan</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</div>
</body>
</html>