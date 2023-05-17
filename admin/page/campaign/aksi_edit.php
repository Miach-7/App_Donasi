<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $status = $_POST['status'];
    $id_campaign = $_POST['id_campaign'];
        $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_campaign SET status_campaign = '$status' WHERE id_campaign = '$id_campaign'");
        if ($QueryEdit) {
            echo "
            <script>
                alert('Data berhasil dirubah');
                window.location = 'main.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal dirubah');
                window.location = 'form_edit.php';
            </script>";
        }
    }

