<?php
// memanggil dari config.php
require_once "../../koneksi.php";

// memanggil dari folder asset
$title = "Data User";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="<?= $main_url?>asset/sb-admin/css/styles.css" rel="stylesheet" />

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3">Data User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../../admin.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a>Data User</a></li>
            </ol>
            <div class="mb-4">
                <a href="tambah.php" class="btn btn-success" nama="btnsimpan">Tambah Data</a>
            </div>
            <!-- Bagian untuk menampilkan data user -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fa-regular fa-address-book"></i>
                    Data User
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <!-- Data tabel -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Ubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna ORDER BY id_user DESC");
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td>
                                        <div class="input-group">
                                            <input type="password" class="form-control" value="<?php echo $data['password']; ?>" readonly id="password<?= $data['id_user']; ?>">
                                            <button class="btn btn-outline-secondary" type="button" id="showPassword<?= $data['id_user']; ?>" onclick="togglePassword('password<?= $data['id_user']; ?>', 'showPassword<?= $data['id_user']; ?>')">
                                            <i class="fa-regular fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        // Menampilkan teks pengguna langsung
                                        echo $data['pengguna'];
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit.php?id_user=<?= $data['id_user']; ?>" class="text-primary me-2"><i class="fas fa-pen-to-square"></i></a>
                                        <a href="hapus.php?id_user=<?= $data['id_user']; ?>" class="text-danger"><i class="fa-solid fa-trash"></i></a>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?= $main_url?>asset/sb-admin/js/scripts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new simpleDatatables.DataTable('#datatablesSimple');
    });

    function togglePassword(elementId, buttonId) {
        var passwordField = document.getElementById(elementId);
        var showPasswordButton = document.getElementById(buttonId);

        if (passwordField.type === "password") {
            passwordField.type = "text";
            showPasswordButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
        } else {
            passwordField.type = "password";
            showPasswordButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
        }
    }
</script>
