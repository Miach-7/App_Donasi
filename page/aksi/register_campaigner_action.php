<?php
session_start();
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $userName = $_POST['userName'];
    $nama_campaigner = $_POST['nama_campaigner'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);;
    $no_telpon = $_POST['no_telpon'];

    $userName = $_POST['userName'];
  if($userName =="")
  {
      echo "
    <script>
        alert('Data kategori harus diisi');
        window.location='../../register_campaigner.php';
    </script>";
  }
  else
  {
    $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_campaigner (username, password, nama_campaigner, email, no_telpon) VALUES ('$userName', '$password', '$nama_campaigner', '$email', '$no_telpon')");
    if ($QuerySimpan) {
        echo "
    <script>
        alert('Data berhasil disimpan');
        window.location='$base_url'+'login_campaigner.php';
    </script>";
    } else {
        echo "
    <script>
        alert('Data gagal disimpan');
        window.location='$base_url'+'register_campaigner.php';
    </script>";
    }
  }
 