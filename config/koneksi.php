<?php
$host = "localhost";
$nama_db = "db_toko_baju";
$username = "root";
$password = ""; // Sesuaikan jika MySQL Anda memakai password

$dsn = "mysql:host=" . $host . ";dbname=" . $nama_db . ";charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Jangan tampilkan detail koneksi database kepada pengguna.
    error_log($e->getMessage());
    die("Koneksi database gagal. Periksa konfigurasi pada config/koneksi.php.");
}
