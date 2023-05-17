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
    $id_donasi = $_POST['id_donasi'];

      //menghitung total donasi
      $Query = mysqli_query($koneksi, "SELECT * FROM ((tbl_donasi tt INNER JOIN tbl_donatur tp ON tt.id_donatur = tp.id_donatur) INNER JOIN tbl_campaign ttbs ON tt.id_campaign = ttbs.id_campaign) WHERE tt.id_donasi = '$id_donasi'");
      $Row = mysqli_fetch_array($Query);

      $total = $Row['dana_terkumpul'] + $Row['jumlah_donasi'];
      
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
     $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_donasi SET status_donasi = '$status' WHERE id_donasi = '$id_donasi '");
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
    