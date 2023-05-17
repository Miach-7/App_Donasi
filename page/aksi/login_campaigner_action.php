<?php

include "../../lib/koneksi.php";
include "../../lib/config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

if (!ctype_alnum($username) or !ctype_alnum($password)) {
    echo "Login Gagal,<a href=../../login_campaigner.php> Kembali</a>";
} else {
$query = mysqli_query($koneksi, "SELECT * FROM tbl_campaigner WHERE username = '$username' AND password = '$password'");
$login = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);

if ($login > 0) {
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['id_campaigner'] = $row['id_campaigner'];
    $_SESSION['nama_campaigner'] = $row['nama_campaigner'];
    echo "<script>alert('Login Berhasil'); window.location = '$base_url'+'index.php';</script>";
    
} else {
    echo "Login Gagal, <a href=../../login_campaigner.php>Kembali</a>";
}
}
?>