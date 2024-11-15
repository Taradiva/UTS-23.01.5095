<?php
include "./config.php";
$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username)&& !empty($password)){
    $query = mysqli_query($sambung,"select * from user_5095 where USERNAME = '$username' and PASSWORD = '$password'");

    $result = mysqli_num_rows($query);

        if($result>0){
            // header("location:.//index.php");
            // 
            // // echo 'berhasil';
            session_start();

            $_SESSION["akses"] = true;
            header("location:./dasdos.php");
            echo 'berhasil';

        }else{
            header("location:./index.php?app=gagal");
            // echo "raiso cok";
        }
}else {
    header(header: "location:./index.php?app=error");
}
?>