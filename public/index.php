<?php
// 1. Memuat file konfigurasi database, Model Film, dan Controller Film
require_once '../config/database.php';
require_once '../app/models/Film.php';
require_once '../app/controllers/FilmController.php';

// 2. Inisialisasi koneksi database dan objek MVC
$db         = (new Database())->connect();
$model      = new Film($db);
$controller = new FilmController($model);

// 3. Membaca query string 'page' dan 'action' dari URL
$page   = $_GET['page'] ?? 'film';
$action = $_GET['action'] ?? 'index';

// 4. Validasi halaman
if ($page !== 'film') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

// 5. Routing action menggunakan ekspresi match
match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => (function () {
        http_response_code(404);
        exit('Action tidak ditemukan.');
    })()
};