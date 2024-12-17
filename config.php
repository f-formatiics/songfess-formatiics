<?php
$servername = "sql309.infinityfree.com";
$username = "if0_37933721"; // username default untuk XAMPP adalah root
$password = "rLpr5n8ANztPRt"; // password default untuk XAMPP adalah kosong
$dbname = "if0_37933721_songfess_db"; // nama database yang sudah kamu buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
