<?php

//session start
session_start();

//hilangkan session yang sudah di set
unset($_SESSION["id_user"]);
unset($_SESSION["password"]);
unset($_SESSION["pengguna"]);
unset($_SESSION["username"]);

session_destroy();
echo"<script>
alert('Anda telah LOGOUT');
document.location='index.php';
</script>";