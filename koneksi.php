<?php
$host = "localhost"; // Nama host database
$user = "root"; // Username database
$password = ""; // Password database (biasanya kosong di localhost)
$dbname = "menurestorandb"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
