<?php 
require 'koneksi.php';
session_start();
if(isset($_POST['login'])){
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $md5 = md5($password);
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data_user = mysqli_fetch_array($cek_user);
    $role =$data_user['role'];
    if ($role=="admin") {
        $_SESSION["fullname"] =$data_user ['fullname'];
        $_SESSION["id"] =$data_user ['id'];
        $_SESSION["username"] =$data_user ['username'];
        echo "<script type='text/javascript'>alert('Selamat Anda Berhasil Login');
             document.location='../home.php'</script>";
    } else if ($role=="User") {
         echo "<script type='text/javascript'>alert('Selamat Anda Berhasil Login');
      document.location='../user/home.php'</script>";
    }
    else{
               echo "<script type='text/javascript'>alert('Gagal Login !!!');
               document.location='../index.php'</script>";
        }
}
?>