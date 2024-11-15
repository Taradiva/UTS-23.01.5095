<?php
# add file config
require "./1/config.php";

# Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama"]) && isset($_POST["nilai"])) {
    # Get the name and nilai from the form input
    $nama = mysqli_real_escape_string($sambung, $_POST["nama"]);
    $nilai = mysqli_real_escape_string($sambung, $_POST["nilai"]);

    # Update the nilai in the mahasiswa table
    $sql = "UPDATE mahasiswa SET tugas1 = '$nilai' WHERE nama = '$nama'";
    
    # Execute the query and check for errors
    if (mysqli_query($sambung, $sql)) {
        # Redirect back to the main page if the update is successful
        header("Location:./1/dasdos.php?success=Nilai berhasil diupdate");
    } else {
        echo "Error updating record: " . mysqli_error($sambung);
    }
} else {
    # Redirect back if accessed without form submission
    header("Location:./dashboard.php?");
}
?>
