<?php
// memanggil dari config.php
require_once "../../koneksi.php";

// memanggil dari folder asset
$title = "Dashboard - PKL 0";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";
?>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="<?= $main_url?>asset/sb-admin/css/styles.css" rel="stylesheet" />

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3">Data Surat Masuk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url?>admin.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a>Data Surat Masuk</a></li>
            </ol>
            <!-- Bagian untuk menampilkan data surat masuk -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-regular fa-calendar"></i>
                    Tabel Data Surat Masuk
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <!-- Data tabel -->
                        <div class="mb-3">
                            <a href="tambah.php" class="btn btn-success" name="btnsimpan">Tambah Data</a>
                        </div>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No Surat</th>
                                <th>Pengirim</th>
                                <th>perihal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_masuk ORDER BY id_masuk DESC");
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['kode_surat'] ?></td>
                                    <td><?= $data['asal'] ?></td>
                                    <td><?= $data['perihal'] ?></td>
                                    <td>
                                        <a href="lihat.php?id_masuk=<?= $data['id_masuk']; ?>" class="text-primary me-3"><i class="far fa-eye"></i></a>
                                        <a href="edit.php?id_masuk=<?= $data['id_masuk']; ?>" class="text-warning me-3"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="hapus.php?id_masuk=<?= $data['id_masuk']; ?>" class="text-danger "><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= $main_url?>asset/sb-admin/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?= $main_url?>asset/sb-admin/js/datatables-simple-demo.js"></script>