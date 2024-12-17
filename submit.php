<?php
include('config.php');

// Mengecek apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $song_title = $_POST['song_title'];
    $message = $_POST['message'];
    $sender = $_POST['sender'] ?: 'Anonim'; // Default ke 'Anonim' jika pengirim kosong

    // Menyimpan data ke database
    $sql = "INSERT INTO if0_37933721_songfess_db (song_title, message, sender) VALUES ('$song_title', '$message', '$sender')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman utama setelah data disimpan
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
