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
        <form action="ctr_edit.php" method="POST">
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
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($datauser = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td><input type='text' name='nama[]' value='" . $datauser['nama'] . "' readonly /></td>";
                        echo "<td><input type='text' name='Tugas1[]' value='" . $datauser['Tugas1'] . "' /></td>";
                        echo "<td><input type='text' name='Tugas2[]' value='" . $datauser['Tugas2'] . "' /></td>";
                        echo "<td><input type='text' name='Tugas3[]' value='" . $datauser['Tugas3'] . "' /></td>";
                        echo "<td><input type='text' name='Tugas4[]' value='" . $datauser['Tugas4'] . "' /></td>";
                        echo "<td><input type='text' name='Tugas5[]' value='" . $datauser['Tugas5'] . "' /></td>";
                        echo "<td><input type='text' name='UTS[]' value='" . $datauser['UTS'] . "' /></td>";
                        echo "<td><input type='text' name='UAS[]' value='" . $datauser['UAS'] . "' /></td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
                </tabel>
                <button type="submit" name="edit">update</button>
        </form>
    </div>
</body>

</html>