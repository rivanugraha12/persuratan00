<?php
include "../../koneksi.php";

// Menyimpan file Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data Surat.xls"');
header('Pragma: no-cache');
header('Expires: 0');
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6"> Rekapitulasi Data Surat Masuk </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No Surat</th>
            <th>Pengirim</th>
            <th>Perihal</th>
            <th>Deskripsi</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tgl1 = mysqli_real_escape_string($koneksi, $_POST['tanggala']);
        $tgl2 = mysqli_real_escape_string($koneksi, $_POST['tanggalb']);

        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_masuk WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY tanggal ASC");
        $no = 1;
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['kode_surat'] ?></td>
                <td><?= $data['asal'] ?></td>
                <td><?= $data['perihal'] ?></td>
                <td><?= $data['deskripsi'] ?></td>
                <td><?= $data['file'] ?></td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>