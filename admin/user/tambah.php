<?php
// Memanggil dari config.php
require_once "../../koneksi.php";

// Memanggil dari folder asset
$title = "Tambah Data User";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Uji tombol simpan
if (isset($_POST["btnsimpan"])) {
    // htmlspecialchars agar inputan lebih aman dari injection
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    $pengguna = htmlspecialchars($_POST["pengguna"], ENT_QUOTES);

    // Persiapan query simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pengguna (username, password, pengguna) VALUES ('$username', '$password', '$pengguna')");

    if ($simpan) {
        echo "<script>alert('Simpan data SUKSES');document.location='user.php'</script>";
    } else {
        echo "<script>alert('Simpan data GAGAL: " . mysqli_error($koneksi) . "');document.location='tambah.php'</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-0">Tambah Data User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="user.php">Data User</a></li>
                <li class="breadcrumb-item active">Tambah Data User</li>
            </ol>

            <!-- Bagian untuk memasukkan data user -->
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Data User
                </div>
                <div class="card-body">
                    <!-- Form untuk menambah data user -->
                    <form action="tambah.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-user" name="username" placeholder="Isi username..." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Isi password..." required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()" id="togglePassword">
                                    <i class="fa-regular fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pengguna" class="form-label">Level</label>
                            <div class="input-group">
                                <select class="form-select form-control-user" name="pengguna" required>
                                    <option value="" disabled selected hidden>Pilih Level</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Ustadz/Ustadzah">Ustadz/Ustadzah</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-2" name="btnsimpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var toggleButton = document.getElementById('togglePassword');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.innerHTML = '<i class="fa-regular fa-eye-slash" aria-hidden="true"></i>';
        } else {
            passwordInput.type = 'password';
            toggleButton.innerHTML = '<i class="fa-regular fa-eye" aria-hidden="true"></i>';
        }
    }
</script>
