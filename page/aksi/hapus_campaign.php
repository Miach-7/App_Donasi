<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";


    $id_campaign = $_GET['id_campaign'];

    $QueryHapus = mysqli_query($koneksi, "DELETE FROM tbl_campaign WHERE id_campaign = '$id_campaign'");
    if ($QueryHapus) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location= '$base_url'+'page/campaigner/list_campaign.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location = $base_url'+'../campaigner/list_campaign.php';
        </script>";
    }
}