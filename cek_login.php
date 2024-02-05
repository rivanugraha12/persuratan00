<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tambahkan ini untuk debugging
    var_dump($_POST);

    // Pastikan nilai yang diambil dari form ada dan tidak kosong
    $username = isset($_POST["username"]) ? mysqli_real_escape_string($koneksi, $_POST["username"]) : "";
    $password = isset($_POST["password"]) ? mysqli_real_escape_string($koneksi, $_POST["password"]) : "";
    $pengguna = isset($_POST["pengguna"]) ? mysqli_real_escape_string($koneksi, $_POST["pengguna"]) : "";

    // Gunakan LOWER() pada kedua sisi perbandingan untuk memastikan perbandingan tanpa memperhatikan huruf besar/kecil
    $login_query = "SELECT * FROM tbl_pengguna WHERE LOWER(username) = LOWER('$username') AND password = '$password' AND pengguna = '$pengguna'";
    
    // Sebelum eksekusi query, tambahkan ini untuk debugging
    echo "Query: $login_query<br>";

    $login_result = mysqli_query($koneksi, $login_query);

    // Sesudah eksekusi query, tambahkan ini untuk debugging
    var_dump($login_result);

    if (!$login_result) {
        echo "Error: " . mysqli_error($koneksi);
    } else {
        // Tambahkan ini untuk debugging
        echo "Number of Rows: " . mysqli_num_rows($login_result) . "<br>";

        if (mysqli_num_rows($login_result) > 0) {
            $data = mysqli_fetch_array($login_result);
            $_SESSION["id_user"] = $data["id_user"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["password"] = $data["password"];
            $_SESSION["pengguna"] = $data["pengguna"];

            // Ganti ini sesuai dengan tipe pengguna
            if ($pengguna == "Admin") {
                header("location: admin.php");
            } elseif ($pengguna == "Ustadz/Ustadzah") {
                header("location: ustadz.php");
            } else {
                // Pengguna dengan tipe lain, atur destinasi sesuai kebutuhan
                header("location: index.php");
            }
            
            exit();
        } else {
            echo "<script>
                alert('Maaf, Login Anda GAGAL. Pastikan Username dan Password anda benar..');
                document.location='index.php';
                </script>";
        }
    }

    mysqli_close($koneksi);
} else {
    header("location: index.php");
    exit();
}
?>
