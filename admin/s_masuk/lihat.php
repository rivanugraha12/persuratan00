<?php
require_once "../../koneksi.php";
$title = "Lihat Data Tamu";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-2">Lihat Detail Surat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url?>admin.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="s_masuk.php">Data Surat Masuk</a></li>
                <li class="breadcrumb-item active">Lihat Detail Surat</li>
            </ol>

            <!-- Menampilkan data surat masuk -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    Detail Data Surat Masuk
                </div>
                <div class="card-body">
                    <?php
                    $id_masuk = $_GET['id_masuk'];
                    if ($id_masuk) {
                        $sql = "SELECT * FROM tbl_masuk WHERE id_masuk = $id_masuk";
                        $result = mysqli_query($koneksi, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                                $file_name = "../bukti_surat/s_masuk/" . $row["file"];
                                ?>
                                <h6 class="mt-0">Tanggal:</h6>
                                <p><?php echo $row["tanggal"]; ?></p>
                                <hr class="mb-2">
                                <h6>No Surat:</h6>
                                <p><?php echo $row["kode_surat"]; ?></p>
                                <hr class="mb-2">
                                <h6>Pengirim:</h6>
                                <p><?php echo $row["asal"]; ?></p>
                                <hr class="mb-2">
                                <h6>Perihal:</h6>
                                <p><?php echo $row["perihal"]; ?></p>
                                <hr class="mb-2">
                                <h6>Deskripsi:</h6>
                                <p><?php echo $row["deskripsi"]; ?></p>
                                <hr class="mb-2">
                                <h6>File:</h6>
                                <?php
                                if (file_exists($file_name)) {
                                    ?>
                                    <p><a href="<?php echo $file_name; ?>" target="_blank"><?php echo $row["file"]; ?></a></p>
                                <?php
                                } else {
                                    echo "<p>File not found. Check the file path: $file_name</p>";
                                }
                                ?>
                                <!-- Tambahkan margin bawah pada elemen terakhir -->
                                <hr style="margin-bottom: 0;">
                    <?php
                            }
                        } else {
                            echo "<p>Error retrieving data: " . mysqli_error($koneksi) . "</p>";
                        }
                    } else {
                        echo "<h3>Data surat tidak ditemukan</h3>";
                    }
                    ?>
                    <div class="d-flex justify-content-end mt-3">
                        <!-- Tambahkan tombol "Kembali" dengan kelas ml-2 untuk memberikan sedikit margin -->
                        <a href="s_masuk.php" class="btn btn-secondary" name="btnsimpan">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
