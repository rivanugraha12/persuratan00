<?php
require_once "../../koneksi.php";
$title = "Edit Data Surat keluar";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Uji tombol simpan
if (isset($_POST["btnsimpan"])) {
    $id_keluar = $_POST["id_keluar"];
    $tgl = date("Y-m-d");

    // htmlspecialchars agar inputan lebih aman dari injection
    $kode_surat = htmlspecialchars($_POST["kode_surat"], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST["tujuan"], ENT_QUOTES);
    $perihal = htmlspecialchars($_POST["perihal"], ENT_QUOTES);
    $deskripsi = htmlspecialchars($_POST["deskripsi"], ENT_QUOTES);

    // Persiapan untuk unggah file
    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];

    // Check if a new file is uploaded
    $upload_new_file = !empty($file_name);

    // If a new file is uploaded, then proceed with type check
    if ($upload_new_file) {
        $file_type = $_FILES['file']['type'];

        // Tentukan tipe file yang diizinkan
        $allowed_types = array(
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg',
            'image/jpg',
            'image/png'
        );

        // Periksa apakah tipe file diizinkan
        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Tipe file tidak diizinkan. Harap pilih file PDF, DOC, DOCX, JPG, JPEG, atau PNG.');document.location='edit.php?id_keluar=$id_keluar'</script>";
            exit; // Stop execution if file type is not allowed
        }
    }

    // Jika pengguna memilih untuk tidak mengunggah file baru, hanya perbarui bidang lainnya
    if (!$upload_new_file) {
        $update = mysqli_query($koneksi, "UPDATE tbl_keluar SET
            tanggal='$tgl',
            kode_surat='$kode_surat',
            tujuan='$tujuan',
            perihal='$perihal',
            deskripsi='$deskripsi'
            WHERE id_keluar=$id_keluar");

        if ($update) {
            echo "<script>alert('Update data SUKSES');document.location='s_keluar.php'</script>";
        } else {
            echo "<script>alert('Update data GAGAL: " . mysqli_error($koneksi) . "');document.location='edit.php?id_keluar=$id_keluar'</script>";
        }
    } else {
        // Jika pengguna mengunggah file baru, perbarui bidang dan unggah file
        // Simpan file ke direktori
        $upload_dir = "../bukti_surat/s_keluar/"; // Gantilah dengan path yang benar
        $target_file = $upload_dir . basename($file_name);

        // Persiapan query update data
        $update = mysqli_query($koneksi, "UPDATE tbl_keluar SET
            tanggal='$tgl',
            kode_surat='$kode_surat',
            tujuan='$tujuan',
            perihal='$perihal',
            deskripsi='$deskripsi',
            file='$file_name'
            WHERE id_keluar=$id_keluar");

        if ($update) {
            // Pindahkan file ke direktori yang diinginkan
            move_uploaded_file($file_temp, $target_file);

            echo "<script>alert('Update data SUKSES');document.location='s_keluar.php'</script>";
        } else {
            echo "<script>alert('Update data GAGAL: " . mysqli_error($koneksi) . "');document.location='edit.php?id_keluar=$id_keluar'</script>";
        }
    }
}

// Mendapatkan data surat keluar yang akan di-edit
$id_keluar = $_GET['id_keluar'];
$sql = "SELECT * FROM tbl_keluar WHERE id_keluar = $id_keluar";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-0">Edit Data Surat keluar</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url?>admin.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="s_keluar.php">Data Surat keluar</a></li>
                <li class="breadcrumb-item active">Edit Data Surat keluar</li>
            </ol>

            <!-- Form untuk mekeluarkan data surat keluar -->
            <div class="card mb-4">
                <div class="card-header">
                    Edit Data Surat keluar
                </div>
                <div class="card-body">
                    <!-- Form untuk mengedit data surat keluar -->
                    <form action="edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_keluar" value="<?php echo $row['id_keluar']; ?>">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control form-control-user" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_surat" class="form-label">No Surat</label>
                            <input type="text" class="form-control form-control-user" name="kode_surat" value="<?php echo $row['kode_surat']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">tujuan</label>
                            <input type="text" class="form-control form-control-user" name="tujuan" value="<?php echo $row['tujuan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <input type="text" class="form-control form-control-user" name="perihal" value="<?php echo $row['perihal']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control form-control-user" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Bukti Surat</label>                            
                            <p><?php echo $row['file']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Bukti Surat</label>
                            <input class="form-control" type="file" id="formFile" name="file">
                            <label for="existing_file" class="form-label small">* Pilih file PDF, DOC, DOCX, JPG, JPEG, atau PNG. File lama akan tetap digunakan jika tidak memilih file baru.</label>
                        </div>
                        <button type="submit" class="btn btn-success mt-2" name="btnsimpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
