<?php
require_once "../../koneksi.php";

function deleteData($id)
{
    global $koneksi;
    $sql  = "DELETE FROM tbl_keluar WHERE id_keluar = '$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        return true; // Mengembalikan nilai true jika berhasil hapus data
    } else {
        return "Gagal melakukan delete data: " . mysqli_error($koneksi);
    }
}

if (isset($_GET['id_keluar'])) {
    $id_keluar = $_GET['id_keluar'];

    // panggil fungsi deleteData untuk menghapus data
    $result = deleteData($id_keluar);

    if ($result === true) {
        echo "<script>alert('Hapus data SUKSES');document.location='s_keluar.php'</script>";
    } else {
        echo "<script>alert('Hapus data GAGAL: $result');document.location='s_keluar.php'</script>";
    }
} else {
    echo "<script>alert('ID tidak diberikan');document.location='s_keluar.php'</script>";
}
?>
