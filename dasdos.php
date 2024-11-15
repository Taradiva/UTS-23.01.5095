<?php
require 'config.php';
session_start();
$akses = @$_SESSION["akses"]; //True atau False

// Mengecek status login dari dashboard
if ($akses != true) {
    header("location:index.php?error=Untuk mengakses halaman dashboard harus Login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php
    require "./config.php";
    $sql = "SELECT * FROM mahasiswa";
    $query = mysqli_query($sambung, $sql);
    ?>
    <header>
        <h2>Rekapitulasi Mahasiswa</h2>
        <a class="logout-btn" href="logout.php">Logout</a>
    </header>
    <div class="content">
        <div>
            <div>
                <form action="add_data.php" method="POST">
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required><br>
                    <button type="submit">Tambah Data</button>
                </form>
            </div>
            <div>
                <a href="edit.php"><button type="submit">UPDATE Nilai</button></a>
            </div>
        </div>
        <table border=1>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tugas 1</th>
                    <th>Tugas 2</th>
                    <th>Tugas 3</th>
                    <th>Tugas 4</th>
                    <th>Tugas 5</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($datauser = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $datauser["nama"] . "</td>";
                    echo "<td>" . $datauser["Tugas1"] . "</td>";
                    echo "<td>" . $datauser["Tugas2"] . "</td>";
                    echo "<td>" . $datauser["Tugas3"] . "</td>";
                    echo "<td>" . $datauser["Tugas4"] . "</td>";
                    echo "<td>" . $datauser["Tugas5"] . "</td>";
                    echo "<td>" . $datauser["UTS"] . "</td>";
                    echo "<td>" . $datauser["UAS"] . "</td>";
                    echo "<td>";
                    echo "<form action='delete.php' method='POST' style='display:inline;'>"; // Inline untuk form delete
                    echo "<input type='hidden' name='nama' value='" . htmlspecialchars($datauser["nama"]) . "'>"; // Sembunyikan nama mahasiswa untuk penghapusan
                    echo "<button type='submit' class='btn btn-danger btn-sm mt-2 ml-2'>HAPUS</button>"; // Tombol hapus
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
            </tabel>
    </div>
</body>

</html>