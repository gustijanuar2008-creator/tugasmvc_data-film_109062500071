<?php
class FilmController
{
    private const LIST_URL = 'index.php?page=film';

    public function __construct(private Film $model) {}

    public function index(): void
    {
        $film = $this->model->getAll();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        $old = $_SESSION['old'] ?? [];
        unset($_SESSION['old']);
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $data   = $this->readInput($_POST);
        $errors = $this->validate($data);

        if ($errors) {
            $_SESSION['old'] = $data;
            $this->redirect('index.php?page=film&action=create', 'error', implode(' ', $errors));
        }

        try {
            $this->model->insert($data);
            $this->redirect(self::LIST_URL, 'success', 'Film berhasil ditambahkan.');
        } catch (PDOException $e) {
            $_SESSION['old'] = $data;
            $this->redirect('index.php?page=film&action=create', 'error', $this->dbMessage($e));
        }
    }

    public function edit(): void
    {
        $id   = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);

        if (!$film) {
            http_response_code(404);
            exit('Data film tidak ditemukan.');
        }
        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $id      = (int) ($_POST['id'] ?? 0);
        $data    = $this->readInput($_POST);
        $errors  = $this->validate($data);
        $editUrl = "index.php?page=film&action=edit&id=$id";

        if ($errors) {
            $this->redirect($editUrl, 'error', implode(' ', $errors));
        }

        try {
            $this->model->update($id, $data);
            $this->redirect(self::LIST_URL, 'success', 'Data film berhasil diperbarui.');
        } catch (PDOException $e) {
            $this->redirect($editUrl, 'error', $this->dbMessage($e));
        }
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->redirect(self::LIST_URL, 'success', 'Film berhasil dihapus.');
        } catch (PDOException $e) {
            $this->redirect(self::LIST_URL, 'error', 'Gagal menghapus data film.');
        }
    }

    private function readInput(array $input): array
    {
        return [
            'judul'        => trim($input['judul'] ?? ''),
            'sutradara'    => trim($input['sutradara'] ?? ''),
            'genre'        => trim($input['genre'] ?? ''),
            'tahun_rilis'  => trim($input['tahun_rilis'] ?? ''),
            'durasi_menit' => trim($input['durasi_menit'] ?? '')
        ];
    }

    private function validate(array $d): array
    {
        $errors = [];

        if ($d['judul'] === '' || $d['sutradara'] === '' || $d['genre'] === '') {
            $errors[] = 'Judul, sutradara, dan genre wajib diisi.';
        }

        $maxYear = (int) date('Y') + 1;
        if (!ctype_digit($d['tahun_rilis']) || (int) $d['tahun_rilis'] < 1888 || (int) $d['tahun_rilis'] > $maxYear) {
            $errors[] = "Tahun rilis harus berupa angka antara 1888 dan $maxYear.";
        }

        if (!ctype_digit($d['durasi_menit']) || (int) $d['durasi_menit'] < 1 || (int) $d['durasi_menit'] > 600) {
            $errors[] = 'Durasi harus berupa angka antara 1 dan 600 menit.';
        }

        return $errors;
    }

    private function dbMessage(PDOException $e): string
    {
        // 23000 = pelanggaran constraint (judul + tahun rilis duplikat)
        return $e->getCode() === '23000'
            ? 'Film dengan judul dan tahun rilis yang sama sudah terdaftar.'
            : 'Terjadi kesalahan pada database.';
    }

    private function redirect(string $url, string $type, string $message): never
    {
        $_SESSION['flash'] = ['type' => $type, 'message' => $message];
        header("Location: $url");
        exit;
    }
}