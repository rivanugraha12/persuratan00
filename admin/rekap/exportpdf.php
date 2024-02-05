<?php
require_once "../../koneksi.php";
require_once('../../asset/tcpdf/tcpdf.php');

// Menyimpan file PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Nama file PDF
$pdf_filename = "Data Surat Masuk.pdf";

// Set dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PKL');
$pdf->SetTitle('Data Surat Masuk');
$pdf->SetSubject('Rekap Data Surat Masuk');
$pdf->SetKeywords('PDF, Data Surat Masuk');

// Set halaman
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Tambah halaman baru
$pdf->AddPage();

// Tambahkan isi PDF
$html = '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead style="background-color: #4CAF50; color: #fff; text-align: center;">
        <tr>
            <th colspan="7" style="font-size: 16px; font-weight: bold; padding: 10px; background-color: #60D69A; text-align: center; width: 100%">Rekap Data Surat Masuk</th>
        </tr>
        <tr>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 5%;">#</th>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 12%;">Tanggal</th>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 14%;">No Surat</th>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 14%;">Pengirim</th>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 14%;">Perihal</th>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 20%;">Deskripsi</th>
            <th style="font-size: 12px; font-weight: bold; padding: 10px; width: 21%;">Nama File</th>              
        </tr>
    </thead>
    <tbody>';

// ...
$tgl1 = mysqli_real_escape_string($koneksi, $_POST['tanggala']);
$tgl2 = mysqli_real_escape_string($koneksi, $_POST['tanggalb']);

$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_masuk WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_masuk ASC");
$no = 1;

while ($data = mysqli_fetch_array($tampil)) {
    $html .= "<tr>
    <td style=\"font-size: 12px; padding: 10px; width: 5%\">$no</td>
    <td style=\"font-size: 12px; padding: 10px; width: 12%\">{$data['tanggal']}</td>
    <td style=\"font-size: 12px; padding: 10px; width: 14%\">{$data['kode_surat']}</td>
    <td style=\"font-size: 12px; padding: 10px; width: 14%\">{$data['asal']}</td>
    <td style=\"font-size: 12px; padding: 10px; width: 14%\">{$data['perihal']}</td>
    <td style=\"font-size: 12px; padding: 10px; width: 20%;\">{$data['deskripsi']}</td>
    <td style=\"font-size: 12px; padding: 10px; width: 21%;\">{$data['file']}</td>
</tr>";


    $no++;
}

$html .= '</tbody></table>';
// ...

// Menuliskan HTML ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Simpan file PDF
$pdf->Output($pdf_filename, 'D');
