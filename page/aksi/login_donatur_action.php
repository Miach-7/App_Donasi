<?php

include "../../lib/koneksi.php";
include "../../lib/config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

if (!ctype_alnum($username) or !ctype_alnum($password)) {
    echo "Login Gagal,<a href=../../login_donatur.php> Kembali</a>";
} else {
$query = mysqli_query($koneksi, "SELECT * FROM tbl_donatur WHERE username = '$username' AND password = '$password'");
$login = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);

if ($login > 0) {
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['id_donatur'] = $row['id_donatur'];
    $_SESSION['nama_donatur'] = $row['nama_donatur'];
    echo "<script>alert('Login Berhasil'); window.location = '$base_url'+'index.php';</script>";
    
} else {
    echo "Login Gagal, <a href=../../login_donatur.php>Kembali</a>";
}
}
?>