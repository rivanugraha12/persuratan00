<?php
require_once "../../koneksi.php";
$title = "Tambah Data Surat Masuk";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// Uji tombol simpan
if (isset($_POST["btnsimpan"])) {

    // htmlspecialchars agar inputan lebih aman dari injection
    $kode_surat = htmlspecialchars($_POST["kode_surat"], ENT_QUOTES);
    $asal = htmlspecialchars($_POST["asal"], ENT_QUOTES);
    $perihal = htmlspecialchars($_POST["perihal"], ENT_QUOTES);
    $deskripsi = htmlspecialchars($_POST["deskripsi"], ENT_QUOTES);
    $tgl = date("Y-m-d");

    // Persiapan untuk unggah file
    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
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
    if (in_array($file_type, $allowed_types)) {
        // Simpan file ke direktori
        $upload_dir = "../bukti_surat/s_masuk/"; // Gantilah dengan path yang benar
        $target_file = $upload_dir . basename($file_name);

        // Persiapan query simpan data
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_masuk (tanggal, kode_surat, asal, perihal, deskripsi, file) VALUES ('$tgl','$kode_surat', '$asal', '$perihal', '$deskripsi', '$file_name')");

        if ($simpan) {
            // Pindahkan file ke direktori yang diinginkan
            move_uploaded_file($file_temp, $target_file);

            echo "<script>alert('Simpan data SUKSES');document.location='s_masuk.php'</script>";
        } else {
            echo "<script>alert('Simpan data GAGAL: " . mysqli_error($koneksi) . "');document.location='tambah.php'</script>";
        }
    } else {
        echo "<script>alert('Tipe file tidak diizinkan. Harap pilih file PDF, DOC, DOCX, JPG, JPEG, atau PNG.');document.location='tambah.php'</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-0">Tambah Data Surat Masuk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>admin.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="s_masuk.php">Data Surat Masuk</a></li>
                <li class="breadcrumb-item active">Tambah Data Surat Masuk</li>
            </ol>

            <!-- Form untuk memasukkan data surat masuk -->
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Data Surat Masuk
                </div>
                <div class="card-body">
                    <!-- Form untuk menambah data surat masuk -->
                    <form action="tambah.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control form-control-user" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_surat" class="form-label">No Surat</label>
                            <input type="text" class="form-control form-control-user" name="kode_surat" placeholder="Isi kode surat..." required>
                        </div>
                        <div class="mb-3">
                            <label for="asal" class="form-label">Pengirim</label>
                            <input type="text" class="form-control form-control-user" name="asal" placeholder="Asal surat...">
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control form-control-user" name="perihal" placeholder="Perihal surat..." required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control form-control-user" name="deskripsi" placeholder="Deskripsi surat..." required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Bukti Surat</label>
                            <input class="form-control" type="file" id="formFile" name="file">
                        </div>
                        <button type="submit" class="btn btn-success mt-2" name="btnsimpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>