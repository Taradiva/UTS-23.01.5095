<?php 
// Server
$server = "localhost"; 
// Username server
$user = "root";
// Password server
$password_server = "";
// Nama database
$nama_database = "auth_5095"; 

$sambung = mysqli_connect($server, $user, $password_server, $nama_database);
if(!$sambung){
    die("Ada masalah koneksi ke database: " . mysqli_connect_error());
} 
?>