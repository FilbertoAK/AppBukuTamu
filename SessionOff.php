<?php
if (empty($_SESSION['username'])) {
    echo"<script>alert('Maaf,Untuk Mengakses Halaman ini,Anda Harus Login ');document.location='index.php'</script>";
};
?>