<?php
require 'controller/ControllerAgenda.php';
$query = tampildata("SELECT * FROM agenda");
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
            <h1>Agenda</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Agenda</li>
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
                                <th>Notulen</th>
                                <th>Notulensi</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach($query as $row): ?> -->
                            <tr>
                                <td><?=$row['notulen']?></td>
                                <td><?=$row['notulensi']?></td>
                                <td><?=$row['file']?></td>
                                <td class="text-center">
                                    <?php 
                                            if($row['status']==1){
                                                echo "<span class='badge bg-success'>Active</span>";
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
                                        data-bs-target="#edit<?=$row['idagenda']?>">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?=$row['idagenda']?>">Hapus</button>
                                </td>
                            </tr><!-- Modal -->
                            <div class="modal fade" id="edit<?=$row['idagenda']?>" tabindex="-1"
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
                                            <input type="hidden" name="id" value="<?=$row['idagenda']?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="notulen" class="form-label">Notulen</label>
                                                    <input type="text" class="form-control" name="notulen"
                                                        value="<?=$row['notulen']?>" id="notulen">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="notulensi" class="form-label">Notulensi</label>
                                                    <input type="text" class="form-control" name="notulensi"
                                                        value="<?=$row['notulensi']?>" id="notulensi">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">File</label>
                                                    <input type="file" class="form-control" name="file"
                                                        value="<?=$row['file']?>" id="file">
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
                            <div class="modal fade" id="hapus<?=$row['idagenda']?>" tabindex="-1"
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
                                            <input type="hidden" name="id" value="<?=$row['idagenda']?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="notulen" class="form-label">Notulen</label>
                                                    <input type="text" class="form-control" name="dskripsi"
                                                        value="<?=$row['notulen']?>" id="notulen">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="notulensi" class="form-label">Notulensi</label>
                                                    <input type="text" class="form-control" name="notulensi"
                                                        value="<?=$row['notulensi']?>" id="notulensi">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">Notulensi</label>
                                                    <input type="text" class="form-control" name="file"
                                                        value="<?=$row['file']?>" id="file">
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
                <form action="controller/ControllerAgenda.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="notulen" class="form-label">Notulen</label>
                            <input type="text" class="form-control" id="notulen" name="notulen">
                        </div>
                        <div class="mb-3">
                            <label for="notulensi" class="form-label">Notulensi</label>
                            <input type="text" class="form-control" id="notulensi" name="notulensi">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" onclick="contoh()" class="btn btn-primary" name="simpan">Simpan </button>
                </form>
            </div>
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