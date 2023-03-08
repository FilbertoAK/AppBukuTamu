<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php'; 
// Created
if (isset($_POST['simpan'])){
    $kategori = $_POST['kategori'];
    $deksripsi = $_POST['deksripsi'];
    $insert = mysqli_query($koneksi, "INSERT INTO kategori(kategori,deksripsi) 
    VALUES ('$kategori','$deksripsi') ");
        if($insert){
            echo "<script type='text/javascript'>alert('Sukses');
             document.location='../kategori.php'</script>";
           }else{
               header('Location: kategori.php');   
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
    $idkategori = $_POST['id'];
    $deksripsi = $_POST['deksripsi'];
    $kategori = $_POST['kategori'];
    $waktu = date('Y-m-d  H:i:s');
    $status =  $_POST['status'];
    $update = mysqli_query($koneksi, "UPDATE kategori SET 
    kategori='$kategori',deksripsi='$deksripsi', update_at='$waktu', status_user='$status' WHERE idkategori='$idkategori'");
            if($update){
                $_SESSION["ubah"] = 'Data Berhasil DiUbah';
               }else{
                  // header('Location: kategori_buku.php');   
               }
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $idkategori = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE
    idkategori='$idkategori'");
    if($delete){
        $_SESSION["hapus"] = 'Data Berhasil DiHapus';
       }else{
           //header('Location: kategori_buku.php');   
       }
    }

?>