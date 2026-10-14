<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Film</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Daftar Film</h2>
    <?php require __DIR__ . '/../partials/flash.php'; ?>
    <a class="btn" href="index.php?page=film&action=create">+ Tambah Film</a>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Sutradara</th>
            <th>Genre</th>
            <th>Tahun Rilis</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>
        <?php if (empty($film)): ?>
            <tr><td colspan="7" class="center">Belum ada data film.</td></tr>
        <?php endif; ?>
        <?php foreach ($film as $i => $f): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['sutradara']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars($f['tahun_rilis']) ?></td>
            <td><?= htmlspecialchars($f['durasi_menit']) ?> menit</td>
            <td>
                <a href="index.php?page=film&action=edit&id=<?= (int) $f['id'] ?>">Edit</a>
                <form method="post" action="index.php?page=film&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="id" value="<?= (int) $f['id'] ?>">
                    <button type="submit" class="danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>