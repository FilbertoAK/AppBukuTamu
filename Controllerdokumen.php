<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php'; 

// Created
if (isset($_POST['simpan'])){
    $namafile = $_POST['namafile'];
    $keterangan = $_POST['keterangan'];
    $insert = mysqli_query($koneksi, "INSERT INTO dokumen (namafile,keterangan) 
    VALUES ('$namafile','$keterangan') ");
        if($insert){
            echo "<script type='text/javascript'>
             document.location='../dokumen.php'</script>";
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
    $iddokumen = $_POST['iddokumen'];
    $id = $_POST['id'];
    $idbukutamu = $_POST['idbukutamu'];
    $namafile = $_POST['kategori'];
    $keteragan = $_POST['keteragan'];
    $status = $_POST['status'];
    $waktu = date('Y-m-d  H:i:s');
    $update = mysqli_query($koneksi, "UPDATE dokumen SET 
    idbukutamu='$idbukutamu',id='$id',namafile='$namafile',keteragan='$keteragan',status='$status', update_at='$waktu' WHERE iddokumen='$id'");
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $id = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM dokumen WHERE
    iddokumen='$id'");
}

?>