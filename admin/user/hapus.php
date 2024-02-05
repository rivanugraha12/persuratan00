<?php
require_once "../../koneksi.php";

function deleteData($id)
{
    global $koneksi;
    $sql  = "DELETE FROM tbl_pengguna WHERE id_user = '$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        return true; // Mengembalikan nilai true jika berhasil hapus data
    } else {
        return "Gagal melakukan delete data: " . mysqli_error($koneksi);
    }
}

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // panggil fungsi deleteData untuk menghapus data
    $result = deleteData($id_user);

    if ($result === true) {
        echo "<script>alert('Hapus data SUKSES');document.location='user.php'</script>";
    } else {
        echo "<script>alert('Hapus data GAGAL: $result');document.location='user.php'</script>";
    }
} else {
    echo "<script>alert('ID tidak diberikan');document.location='user.php'</script>";
}
?>
