<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php'; 
// Created
if (isset($_POST['simpan'])){
    $notulen = $_POST['notulen'];
    $notulensi = $_POST['notulensi'];
    $file = $_POST['file'];
    $insert = mysqli_query($koneksi, "INSERT INTO agenda(notulen,notulensi,file) 
    VALUES ('$notulen','$notulensi','$file') ");
        if($insert){
            echo "<script type='text/javascript'>alert('Sukses');
            document.location='../Agenda.php'</script>";
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
    $idagenda = $_POST['id'];
    $notulen = $_POST['notulen'];
    $notulensi = $_POST['notulensi'];
    $waktu = date('Y-m-d  H:i:s');
    $status =  $_POST['status'];
    $file = $_POST['file'];
    $update = mysqli_query($koneksi, "UPDATE agenda SET notulen='$notulen',file='$file',status='$status', update_at='$waktu',notulensi='$notulensi' WHERE idagenda='$idagenda'");
            if($update){
                $_SESSION["ubah"] = 'Data Berhasil DiUpdate';
               }else{
                  // header('Location: kategori_buku.php');   
               }
}


//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $idagenda = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM agenda WHERE
    idagenda='$idagenda'");
    if($delete){
        $_SESSION["hapus"] = 'Data Berhasil DiHapus';
       }else{
           //header('Location: kategori_buku.php');   
       }
    }

?>