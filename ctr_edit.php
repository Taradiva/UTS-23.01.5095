<?php
require "./config.php";

if (isset($_POST['edit'])) {
    // Mendapatkan nilai dari form
    $nama = $_POST['nama']; // Array nama mahasiswa
    $Tugas1 = $_POST['Tugas1'];
    $Tugas2 = $_POST['Tugas2'];
    $Tugas3 = $_POST['Tugas3'];
    $Tugas4 = $_POST['Tugas4'];
    $Tugas5 = $_POST['Tugas5'];
    $UTS = $_POST['UTS'];
    $UAS = $_POST['UAS'];

    // Pastikan array nama ada isinya
    if (empty($nama)) {
        die("Nama mahasiswa tidak ditemukan");
    }

    // Iterasi untuk setiap mahasiswa yang ada di array nama
    for ($i = 0; $i < count($nama); $i++) {
        // Query update nilai mahasiswa berdasarkan nama
        $sql = "UPDATE mahasiswa SET 
                Tugas1 = '$Tugas1[$i]',
                Tugas2 = '$Tugas2[$i]',
                Tugas3 = '$Tugas3[$i]',
                Tugas4 = '$Tugas4[$i]',
                Tugas5 = '$Tugas5[$i]',
                UTS = '$UTS[$i]',
                UAS = '$UAS[$i]'
                WHERE nama = '$nama[$i]'"; // Menggunakan nama sebagai kondisi

        // Jalankan query update
        $query = mysqli_query($sambung, $sql);

        // Cek apakah query berhasil dijalankan
        if (!$query) {
            die("Gagal menyimpan perubahan untuk nama: " . $nama[$i]);
        }
    }

    // Jika semua berhasil
    header('Location: ./dasdos.php'); // Redirect ke dashboard setelah berhasil
    exit();
} else {
    die("Akses dilarang");
}
?>