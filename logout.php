<?php 

#Membuka session
session_start();

#Menghapus semua session
session_destroy();

# Lempar user ke halaman login
header("location:index.php");

?>