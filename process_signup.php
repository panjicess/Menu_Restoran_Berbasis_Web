<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "menurestorandb";  // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Enkripsi password

    // Query untuk menyimpan data ke dalam database
    $sql = "INSERT INTO members (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='alert alert-success'>Akun Anda telah berhasil dibuat!</p>";
    } else {
        echo "<p class='alert alert-danger'>Error: " . $conn->error . "</p>";
    }
}

// Tutup koneksi
$conn->close();
?>
