<?php 
require "./config.php";
session_start();

// cek apakah user memiliki akses
$akses = @$_SESSION["akses"];
if ($akses != true) {
    // redirect ke login jika tidak memiliki akses
    header("location:./loginform1.php?error=Halaman Dashboard Harus Login");
    exit;
}

// periksa apakah ada data nama yang diterima
if (isset($_POST['nama'])) {
    // ambil nama dari POST
    $nama = mysqli_real_escape_string($sambung, $_POST['nama']);
    
    // query untuk menghapus data berdasarkan nama
    $sql = "DELETE FROM mahasiswa WHERE nama = '$nama'";
    
    // eksekusi query
    if (mysqli_query($sambung, $sql)) {
        // redirect ke halaman dashboard setelah berhasil menghapus data
        header("location: dasdos.php?message=Data Mahasiswa Berhasil Dihapus");
    } else {
        // tampilkan error jika gagal menghapus
        echo "Error: " . mysqli_error($sambung);
    }
} else {
    // jika tidak ada data nama yang diterima
    header("location: dashboard.php?error=Data Mahasiswa Tidak Ditemukan");
}

// tutup koneksi database
mysqli_close($sambung);
?>