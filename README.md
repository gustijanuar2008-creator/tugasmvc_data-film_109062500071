project mvc data film gusti januar putra - 109062500071

# 🎬 Katalog Film - MVC PHP Native

Aplikasi web manajemen data film berbasis PHP Native dengan mengimplementasikan pola arsitektur **Model-View-Controller (MVC)**, koneksi database **PDO**, **Prepared Statements**, dan pelacakan versi menggunakan **Git**[cite: 1, 2, 6, 8].

---

## 📌 Fitur Utama
- **Read Data**: Menampilkan daftar katalog film lengkap dalam format tabel interaktif[cite: 10, 14].
- **Create Data**: Form input film baru dengan validasi data di sisi server[cite: 9, 11, 14].
- **Update Data**: Memperbarui informasi film berdasarkan ID[cite: 9, 11, 14].
- **Delete Data**: Menghapus data film menggunakan metode POST dan konfirmasi dialog[cite: 9, 10, 12, 14].
- **Keamanan Dasar**:
  - Anti SQL Injection menggunakan **PDO Prepared Statements**[cite: 8, 15].
  - Anti Cross-Site Scripting (XSS) menggunakan `htmlspecialchars()` saat rendering data[cite: 12, 15].

---

## 🛠️ Teknologi & Kebutuhan Sistem
- **Bahasa Pemrograman**: PHP 8.0+
- **Database**: MySQL / MariaDB (via PDO)[cite: 6, 14, 16]
- **Web Server**: Laragon / XAMPP[cite: 14, 16]
- **Version Control**: Git[cite: 5, 16]

---

## 🗄️ Skema Database & Entitas Film
Aplikasi ini terhubung ke database `katalog_film` dengan struktur tabel `film` sebagai berikut[cite: 18]:

| Kolom | Tipe Data | Keterangan |
|---|---|---|
| `id` | INT (Primary Key) | Auto Increment[cite: 18] |
| `judul` | VARCHAR(150) | Judul Film (NOT NULL)[cite: 18] |
| `sutradara` | VARCHAR(100) | Nama Sutradara (NOT NULL)[cite: 18] |
| `genre` | VARCHAR(50) | Kategori/Genre Film (NOT NULL)[cite: 18] |
| `tahun_rilis` | SMALLINT | Tahun Perilisan Film (NOT NULL)[cite: 18] |
| `durasi_menit`| SMALLINT | Durasi Film dalam Menit (NOT NULL)[cite: 18] |
| `created_at` | TIMESTAMP | Waktu Data Dibuat[cite: 18] |

---

## 📂 Struktur Folder Proyek
```text
mvc_film_gusti/
├── app/
│   ├── controllers/
│   │   └── FilmController.php      # Mengelola logika bisnis dan alur aplikasi[cite: 4, 8, 9]
│   ├── models/
│   │   └── Film.php                # Akses dan manipulasi data database via PDO[cite: 4, 7, 8]
│   └── views/
│       └── film/
│           ├── create.php          # Tampilan form tambah film[cite: 4, 11]
│           ├── edit.php            # Tampilan form edit film[cite: 4, 11]
│           └── index.php           # Tampilan daftar katalog film[cite: 4, 10]
├── config/
│   └── database.php                # Konfigurasi koneksi PDO MySQL[cite: 4, 6, 7]
├── database/
│   └── katalog_film.sql            # Skema database dan data awal SQL[cite: 5, 18]
├── public/
│   └── index.php                   # Front Controller / Entry Point & Routing[cite: 4, 12]
├── .gitignore                      # File pengecualian pelacakan Git[cite: 4, 5]
└── README.md                       # Dokumentasi resmi proyek