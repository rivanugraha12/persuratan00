<?php
// Memanggil dari config.php
require_once "../../koneksi.php";

// Memanggil dari folder asset
$title = "Rekap Surat Keluar";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";
?>

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="<?= $main_url?>asset/sb-admin/css/styles.css" rel="stylesheet" />

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3">Rekap Surat keluar</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url?>admin.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a>Rekap Surat keluar</a></li>
            </ol>

            <!-- Form untuk menampilkan data -->
            <form method="post">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dari Tanggal:</label>
                            <input class="form-control mt-1" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1']) ? htmlspecialchars($_POST['tanggal1']) : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sampai Tanggal:</label>
                            <input class="form-control mt-1" type="date" name="tanggal2" value="<?= isset($_POST['tanggal2']) ? htmlspecialchars($_POST['tanggal2']) : date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label style="color: transparent;">Submit</label>
                        <button class="btn btn-primary form-control" name="btntampilkan"><i class="fa fa-search"></i> Tampilkan</button>
                    </div>
                </div>
            </form>
            <!-- Bagian untuk menampilkan data surat keluar -->
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fa-regular fa-floppy-disk"></i>
                    Data Rekap Surat Keluar
                </div>
                <!-- Bagian untuk menampilkan data surat keluar -->
                <?php
                if (isset($_POST["btntampilkan"])) :
                    $tgl1 = mysqli_real_escape_string($koneksi, $_POST['tanggal1']);
                    $tgl2 = mysqli_real_escape_string($koneksi, $_POST['tanggal2']);
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_keluar WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_keluar ASC");
                    if ($tampil) :
                ?>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <!-- Data tabel -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>No Surat</th>
                                        <th>Tujuan</th>
                                        <th>Perihal</th>
                                        <th>Deskripsi</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($tampil)) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['tanggal'] ?></td>
                                            <td><?= $data['kode_surat'] ?></td>
                                            <td><?= $data['tujuan'] ?></td>
                                            <td><?= $data['perihal'] ?></td>
                                            <td><?= $data['deskripsi'] ?></td>
                                            <td><?= $data['file'] ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 mt-1 d-flex justify-content-end">
                                    <!-- Tombol Export di sebelah kanan -->
                                    <form method="POST" action="exportexcel.php" class="mb-2">
                                        <input type="hidden" name="tanggala" value="<?= htmlspecialchars($_POST['tanggal1']) ?>">
                                        <input type="hidden" name="tanggalb" value="<?= htmlspecialchars($_POST['tanggal2']) ?>">
                                        <button class="btn btn-success form-control" name="bexport"><i class="fa fa-download"></i> Download Excel</button>
                                    </form>
                                    <form method="POST" action="exportpdf.php" style="margin-left: 5px;">
                                        <input type="hidden" name="tanggala" value="<?= htmlspecialchars($_POST['tanggal1']) ?>">
                                        <input type="hidden" name="tanggalb" value="<?= htmlspecialchars($_POST['tanggal2']) ?>">
                                        <button class="btn btn-danger form-control" name="bexport"><i class="fa fa-download"></i> Download PDF</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    else :
                        echo "Error Data.";
                    endif;
                endif;
                ?>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= $main_url?>asset/sb-admin/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?= $main_url?>asset/sb-admin/js/datatables-simple-demo.js"></script>
