<?php

$server = "localhost";
$user = "root";
$password="";
$database = "db_administrasi";

$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


//url utama
$main_url = "http://localhost/persuratan/";