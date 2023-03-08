<?php
require 'controller/ControllerBukutamu.php';
$query = tampildata("SELECT * FROM bukutamu");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require 'header.php';
    ?>
</head>

<body>

    <?php
require 'navbar.php';
?>

    <!-- ======= Sidebar ======= -->
    <?php
        require'menu.php';
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Buku Tamu</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Buku Tamu</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <div class="container-fluid px-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah
                Data</button>
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach($query as $row): ?> -->
                            <tr>
                                <td><?=$row['kategori']?></td>
                                <td><?=$row['tanggal']?></td>
                                <td><?=$row['waktu']?></td>
                                <td><?=$row['keterangan']?></td>
                                <td><?=$row['namalengkap']?></td>
                                <td class="text-center">
                                    <?php 
                                            if($row['status']==1){
                                                echo "<span class='badge bg-success'>Ative</span>";
                                            }
                                            else{
                                                echo "<span class='badge bg-danger'>NonActive</span>";
                                            }
                                            ?>
                                </td>
                                <td class="text-center"><?=$row['create_at']?></td>
                                <td class="text-center"><?=$row['update_at']?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit<?=$row['idbukutamu']?>">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?=$row['idbukutamu']?>">Hapus</button>
                                </td>
                            </tr><!-- Modal -->
                            <div class="modal fade" id="edit<?=$row['idbukutamu']?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Perubahan Data
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?=$row['idbukutamu']?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" name="kategori"
                                                        value="<?=$row['kategori']?>" id="kategori">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal"
                                                        value="<?=$row['tanggal']?>" id="tanggal">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="waktu" class="form-label">Waktu</label>
                                                    <input type="text" class="form-control" name="waktu"
                                                        value="<?=$row['waktu']?>" id="waktu">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan"
                                                        value="<?=$row['keterangan']?>" id="keterangan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="namalengkap"
                                                        value="<?=$row['namalengkap']?>" id="namalengkap">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="status"
                                                            value="1" id="flexCheckChecked" <?php if($row['status']=="1"){
                                                                        echo"Checked" ;
                                                                    }else{
                                                                        echo"";
                                                                    }
                                                                    ?>>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            <?php if($row['status']=="1"){
                                                                        echo"Active" ;
                                                                    }else{
                                                                        echo"Non-Active";
                                                                    }
                                                                    ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-primary">Simpan
                                                    Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="hapus<?=$row['idbukutamu']?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?=$row['idbukutamu']?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="kategori" class="form-label">Kategori</label>
                                                    <input type="text" class="form-control" id="kategori" readonly
                                                        value="<?=$row['kategori']?>" name="kategori">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                        value="<?=$row['tanggal']?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="waktu" class="form-label">Waktu</label>
                                                    <input type="text" class="form-control" id="waktu" name="waktu"
                                                        value="<?=$row['kategori']?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan"
                                                        value="<?=$row['keterangan']?>" name="keterangan" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="namalengkap"
                                                        value="<?=$row['namalengkap']?>" name="namalengkap" readonly>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="hapuspermanent" class="btn btn-danger">Hapus
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <?php endforeach ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </main><!-- End #main -->

    <?php
    require 'footer.php';
    ?>
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controller/ControllerBukutamu.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="text" class="form-control" id="waktu" name="waktu">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                        <div class="mb-3">
                            <label for="namalengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namalengkap" name="namalengkap">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" onclick="contoh()" class="btn btn-primary" name="simpan">Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
[13:27, 08/03/2023] Richard: ni bro bukut