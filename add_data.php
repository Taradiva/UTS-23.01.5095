<?php
require "./config.php"; // Memanggil koneksi database

// Cek jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($sambung, $_POST["nama"]);

    // Query untuk menambah data ke database
    $sql = "INSERT INTO mahasiswa (nama) VALUES ('$nama')";
    
    if (mysqli_query($sambung, $sql)) {
        // Redirect kembali ke home
        header("Location: ./dasdos.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($sambung);
    }
}
?>
