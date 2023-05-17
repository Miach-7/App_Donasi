<?php
session_start();
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $userName = $_POST['userName'];
    $nama_donatur = $_POST['nama_donatur'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $no_telpon = $_POST['no_telpon'];

    $userName = $_POST['userName'];
  if($userName =="")
  {
      echo "
    <script>
        alert('Data kategori harus diisi');
        window.location='../../register_donatur.php';
    </script>";
  }
  else
  {
    $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_donatur (username, password, nama_donatur,  email, no_telpon) VALUES ('$userName', '$password', '$nama_donatur', '$email', '$no_telpon')");
    if ($QuerySimpan) {
        echo "
    <script>
        alert('Data berhasil disimpan');
        window.location='$base_url'+'login_donatur.php';
    </script>";
    } else {
        echo "
    <script>
        alert('Data gagal disimpan');
        window.location='$base_url'+'register_donatur.php';
    </script>";
    }
 }
