<?php
require_once "../../koneksi.php";

function editData($id)
{
    global $koneksi;
    $sql  = "SELECT * FROM tbl_pengguna WHERE id_user = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $result = mysqli_fetch_array($query);

    if ($result) {
        return $result;
    } else {
        return "Data tidak ditemukan";
    }
}

function updateData($id, $username, $password, $pengguna)
{
    global $koneksi;
    $sql  = "UPDATE tbl_pengguna SET username = '$username', password = '$password', pengguna = '$pengguna' WHERE id_user = '$id'";
    $query = mysqli_query($koneksi, $sql);

    return $query;
}

$title = "Edit Data User - Tamu";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Periksa apakah ID sudah diberikan atau belum
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    // Panggil fungsi editData untuk mendapatkan data yang akan diedit
    $data = editData($id_user);

    if ($data) {
        $username = $data['username'];
        $password = $data['password'];
        $pengguna = $data['pengguna'];
    } else {
        $error = "Data tidak ditemukan";
    }
} else {
    $error = "ID tidak diberikan";
}

// Proses form edit
if (isset($_POST['update'])) {
    // Ambil nilai-nilai dari form
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $pengguna = htmlspecialchars($_POST['pengguna'], ENT_QUOTES);

    // Lakukan validasi dan proses update
    if ($username && $password && $pengguna) {
        $result = updateData($id_user, $username, $password, $pengguna);

        if ($result) {
            echo "<script>alert('Update data SUKSES');document.location='user.php'</script>";
        } else {
            echo "<script>alert('Update data GAGAL: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-0">Edit Data User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?=$main_url?>admin.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="user.php">Data User</a></li>
                <li class="breadcrumb-item active">Edit Data User</li>
            </ol>

            <!-- Form untuk edit data user -->
            <div class="card">
                <div class="card-header">
                    Edit Data User
                </div>
                <div class="card-body">
                    <form action="edit.php?id_user=<?php echo $id_user; ?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pengguna" class="form-label">Level</label>
                            <select class="form-select" id="pengguna" name="pengguna">
                                <option value="Admin" <?php echo ($pengguna == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="Ustadz/Ustadzah" <?php echo ($pengguna == 'Ustadz/Ustadzah') ? 'selected' : ''; ?>>Ustadz/Ustadzah</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= $main_url?>asset/sb-admin/js/scripts.js"></script>
