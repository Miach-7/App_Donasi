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
    $id_pencairan = $_POST['id_pencairan'];

      //menghitung total donasi
      $Query = mysqli_query($koneksi, "SELECT  * FROM (tbl_pencairan tt INNER JOIN tbl_campaign tp ON tt.id_campaign = tp.id_campaign ) where id_pencairan = '$id_pencairan'");
      $Row = mysqli_fetch_array($Query);

      $total = $Row['dana_terkumpul'] - $Row['dana_cair'];


      
      //update dana terkumpul  
      $QueryUpdate = mysqli_query($koneksi, "UPDATE tbl_campaign SET dana_terkumpul = '$total' WHERE id_campaign = '$id_campaign'");
      if ($QueryUpdate) {
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
     //update Status donasi  
     $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_pencairan SET status_pencairan = '$status' WHERE id_pencairan = '$id_pencairan '");
     if ($QueryEdit) {
            echo "
            <script>
                alert('Status berhasil dirubah');
                window.location = 'main.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Status gagal dirubah');
                window.location = 'form_edit.php';
            </script>";
        }
    