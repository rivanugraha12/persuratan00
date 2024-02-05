<?php
// memanggil dari config.php
require_once "koneksi.php";

// memanggil dari folder asset
$title = "Dashboard - Ust";
require_once "ustadz/template/header.php";
require_once "ustadz/template/navbar.php";
require_once "ustadz/template/sidebar.php";
?>

<link href="asset/sb-admin/css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3">Dashboard</h1>
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item active">Home</li>
            </ol>
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <div class="card mb-1">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Diagram Bar Surat Masuk
                        </div>
                        <div class="card-body"><canvas id="myBarChart1" width="100%" height="100"></canvas></div>
                    </div>

                </div>
                <div class="col-lg-5 mb-3">
                    <div class="card mb-1">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Diagram Bar Surat Keluar
                        </div>
                        <div class="card-body"><canvas id="myBarChart2" width="100%" height="100"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mb-2">
                    <div class="card me-1">
                        <div class="card-header"><i class="fa-solid fa-chart-bar me-1"></i>Data Surat Masuk</div>
                        <div class="card-body">
                            <?php
                            // Deklarasi tanggal sekarang
                            $tgl_sekarang = date('Y-m-d');
                            // Menampilkan tgl kemarin
                            $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
                            // Ambil data statistik administrasi dari PHP dan konversi menjadi JavaScript    
                            $h_6 = date('Y-m-d', strtotime('-6 day', strtotime(date('Y-m-d'))));
                            $h_5 = date('Y-m-d', strtotime('-5 day', strtotime(date('Y-m-d'))));
                            $h_4 = date('Y-m-d', strtotime('-4 day', strtotime(date('Y-m-d'))));
                            $h_3 = date('Y-m-d', strtotime('-3 day', strtotime(date('Y-m-d'))));
                            $h_2 = date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d'))));

                            // Menampilkan 6 hari sebelum tgl sekarang
                            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));
                            // Menampilkan Satu Bulan
                            $bulan_ini = date('m');
                            $sekarang = date('Y-m-d h:i:s');
                            // persiapan query menampilkan jumlah data administrasi persuratan
                            $tgl_sekarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$tgl_sekarang%'"));
                            $kemarin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$kemarin%'"));
                            $h_6 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$h_6%'"));
                            $h_5 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$h_5%'"));
                            $h_4 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$h_4%'"));
                            $h_3 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$h_3%'"));
                            $h_2 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal LIKE '%$h_2%'"));
                            $seminggu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE tanggal BETWEEN '$seminggu' AND '$sekarang'"));
                            $sebulan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk WHERE MONTH(tanggal) = '$bulan_ini'"));
                            $keseluruhan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_masuk"));
                            ?>
                            <!-- Menampilkan tabel Statistik -->
                            <table class="table">
                                <tr>
                                    <td>Hari ini</td>
                                    <td>: <?= $tgl_sekarang[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Kemarin</td>
                                    <td>: <?= $kemarin[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Minggu ini</td>
                                    <td>: <?= $seminggu[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Bulan ini</td>
                                    <td>: <?= $sebulan[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Keseluruhan</td>
                                    <td>: <?= $keseluruhan[0] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="card me-1">
                        <div class="card-header"><i class="fa-solid fa-chart-bar me-1"></i>Data Surat Keluar</div>
                        <div class="card-body">
                            <?php
                            // Deklarasi tanggal sekarang
                            $tgl_sekaranggg = date('Y-m-d');
                            // Menampilkan tgl kemarin
                            $kemarinnn = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
                            // Ambil data statistik administrasi dari PHP dan konversi menjadi JavaScript    
                            $h_61 = date('Y-m-d', strtotime('-6 day', strtotime(date('Y-m-d'))));
                            $h_51 = date('Y-m-d', strtotime('-5 day', strtotime(date('Y-m-d'))));
                            $h_41 = date('Y-m-d', strtotime('-4 day', strtotime(date('Y-m-d'))));
                            $h_31 = date('Y-m-d', strtotime('-3 day', strtotime(date('Y-m-d'))));
                            $h_21 = date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d'))));

                            // Menampilkan 6 hari sebelum tgl sekarang
                            $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekaranggg)));
                            // Menampilkan Satu Bulan
                            $bulan_ini = date('m');
                            $sekaranggg = date('Y-m-d h:i:s');
                            // persiapan query menampilkan jumlah data administrasi persuratan
                            $tgl_sekaranggg = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$tgl_sekaranggg%'"));
                            $kemarinnn = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$kemarinnn%'"));
                            $h_61 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$h_61%'"));
                            $h_51 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$h_51%'"));
                            $h_41 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$h_41%'"));
                            $h_31 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$h_31%'"));
                            $h_21 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal LIKE '%$h_21%'"));
                            $seminggu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE tanggal BETWEEN '$seminggu' AND '$sekarang'"));
                            $sebulan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar WHERE MONTH(tanggal) = '$bulan_ini'"));
                            $keseluruhan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) FROM tbl_keluar"));
                            ?>

                            <!-- Menampilkan tabel Statistik -->
                            <table class="table">
                                <tr>
                                    <td>Hari ini</td>
                                    <td>: <?= $tgl_sekaranggg[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Kemarin</td>
                                    <td>: <?= $kemarinnn[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Minggu ini</td>
                                    <td>: <?= $seminggu[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Bulan ini</td>
                                    <td>: <?= $sebulan[0] ?></td>
                                </tr>
                                <tr>
                                    <td>Keseluruhan</td>
                                    <td>: <?= $keseluruhan[0] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="asset/sb-admin/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
    // Ambil data statistik administrasi dari PHP dan konversi menjadi JavaScript
    var dataStatistikSurat = {
        h_6: <?= $h_6[0] ?>,
        h_5: <?= $h_5[0] ?>,
        h_4: <?= $h_4[0] ?>,
        h_3: <?= $h_3[0] ?>,
        h_2: <?= $h_2[0] ?>,
        kemarin: <?= $kemarin[0] ?>,
        hariIni: <?= $tgl_sekarang[0] ?>,
    };
    // Membuat area chart dengan data statistik administrasi
    var ctx = document.getElementById('myBarChart1').getContext('2d');
    var myAreaChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kemarin', 'Hari ini'],
            datasets: [{
                label: 'Surat Masuk',
                data: [dataStatistikSurat.h_6, dataStatistikSurat.h_5, dataStatistikSurat.h_4, dataStatistikSurat.h_3, dataStatistikSurat.h_2, dataStatistikSurat.kemarin, dataStatistikSurat.hariIni],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        stepSize: 1, // Mengatur langkah interval sumbu y
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    // Ambil data statistik administrasi dari PHP dan konversi menjadi JavaScript
    var dataStatistikSurat = {
        h_61: <?= $h_61[0] ?>,
        h_51: <?= $h_51[0] ?>,
        h_41: <?= $h_41[0] ?>,
        h_31: <?= $h_31[0] ?>,
        h_21: <?= $h_21[0] ?>,
        kemarinnn: <?= $kemarinnn[0] ?>,
        hariIniii: <?= $tgl_sekaranggg[0] ?>,
    };
    // Membuat area chart dengan data statistik administrasi
    var ctx = document.getElementById('myBarChart2').getContext('2d');
    var myAreaChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'Kemarin', 'Hari ini'],
            datasets: [{
                label: 'Surat Keluar',
                data: [dataStatistikSurat.h_61, dataStatistikSurat.h_51, dataStatistikSurat.h_41, dataStatistikSurat.h_31, dataStatistikSurat.h_21, dataStatistikSurat.kemarinnn, dataStatistikSurat.hariIniii],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        stepSize: 1, // Mengatur langkah interval sumbu y
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>