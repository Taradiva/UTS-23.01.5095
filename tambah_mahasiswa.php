<?php
# add file config
require "./config.php";

# Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama"])) {
    # Get the name from the form input
    $nama = mysqli_real_escape_string($sambung, $_POST["nama"]);
    
    # Insert name into the mahasiswa table
    $sql = "INSERT INTO mahasiswa (nama) VALUES ('$nama')";
    
    # Execute query and check for errors
    if (mysqli_query($sambung, $sql)) {
        # Redirect back to the dashboard if successful
        header("Location: dasad.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($sambung);
    }
} else {
    # Redirect back if accessed without form submission
    header("Location: dashboard.php");
}
?>
