<?php
include('config.php');

// Mengambil data songfess dari database
$sql = "SELECT * FROM songfess ORDER BY timestamp DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songfess</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" style="">
</head>
<body>
    <!-- Splash Screen -->
    <div id="splash-screen">
        <img id="logo" src="logo.png" alt="Logo">
        <h1>Songfess F Formatiics 24'</h1>
        <p>Haiii, bntr yh mniezz (◎﹏◎)</p>
    </div>
    
    <!-- Form yang akan ditampilkan setelah Splash Screen -->
    <div id="form-container" style="display: none;">
        <h1>Songfess F Formatiics 24'</h1>
        <img id="bunga" src="assets/images/flower.png" alt="bunga">
        <img id="side-image" src="Machintosh.png" alt="Side Image">
        <img id="bunga2" src="assets/images/flower2.png" alt="bunga2">
        <!-- Form untuk mengirim songfess -->
        <form action="submit.php" method="POST">
            <label for="song_title">Judul Lagu (baon cikadap gabakal gw bikinin):</label>
            <input type="text" id="song_title" name="song_title" required>

            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea>

            <label for="sender">Pengirim (klo mw aj si):</label>
            <input type="text" id="sender" name="sender">

            <button type="submit">Kirim</button>
        </form>

        <h2>Songfess yang Terkirim:</h2>
        <ul>
            <?php
            if ($result->num_rows > 0) {
                // Menampilkan data songfess
                while($row = $result->fetch_assoc()) {
                    echo "<li><strong>" . $row["song_title"]. "</strong>: " . $row["message"]. " <em>- " . ($row["sender"] ?: "Anonim") . "</em></li>";
                }
            } else {
                echo "<li>Tidak ada songfess yang dikirim.</li>";
            }
            ?>
        </ul>
        <footer>
            <h4>© 2024 | Formatiics</h4>
        </footer>
    </div>

    <script>
        window.onload = function() {
            // Menunggu beberapa detik, kemudian sembunyikan splash screen dan tampilkan form
            setTimeout(function() {
                // Menyembunyikan splash screen
                document.getElementById('splash-screen').style.display = 'none';
                
                // Menampilkan form
                document.getElementById('form-container').style.display = 'block';
            }, 3000); // Splash screen akan hilang setelah 3 detik
        };
    </script>
</body>
</html>


<?php
$conn->close();
?>
