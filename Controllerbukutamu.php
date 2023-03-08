<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php'; 
// Created
if (isset($_POST['simpan'])){
    $kategori= $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $keterangan = $_POST['keterangan'];
    $namalengkap = $_POST['namalengkap'];
    $insert = mysqli_query($koneksi, "INSERT INTO bukutamu(kategori,tanggal,waktu,keterangan,namalengkap) 
    VALUES ('$kategori','$tanggal','$waktu','$keterangan','$namalengkap') ");
        if($insert){
            echo "<script type='text/javascript'>alert('Sukses');
             document.location='../Bukutamu.php'</script>";
           }else{
               //header('Location: kategori_buku.php');   
           }
}

//Read
function tampildata($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Update
if (isset($_POST['ubah'])){
    $idbukutamu = $_POST['id'];
    $kategori= $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $keterangan = $_POST['keterangan'];
    $namalengkap = $_POST['namalengkap'];
    $waktu = date('Y-m-d  H:i:s');
    $status =  $_POST['status'];
    $update = mysqli_query($koneksi, "UPDATE bukutamu SET 
    kategori='$kategori',tanggal='$tanggal',waktu='$waktu',keterangan='$keterangan',namalengkap='$namalengkap', update_at='$waktu',status='$status' WHERE idbukutamu='$idbukutamu'");
            if($update){
                $_SESSION["ubah"] = 'Data Berhasil DiUpdate';
               }else{
                  // header('Location: kategori_buku.php');   
               }
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $id = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM bukutamu WHERE
    idbukutamu='$id'");
    if($delete){
        $_SESSION["hapus"] = 'Data Berhasil DiHapus';
       }else{
           //header('Location: kategori_buku.php');   
       }
    }

?>