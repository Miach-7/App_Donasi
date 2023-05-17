<?php
session_start();
if (empty($_SESSION['id_admin']) and empty($_SESSION['password'])) 
{
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=<?php echo $admin_url; ?>index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $id_campaigner = $_GET['id_campaigner'];

    $QueryHapus = mysqli_query($koneksi, "DELETE FROM tbl_campaigner WHERE id_campaigner = '$id_campaigner'");
    if ($QueryHapus) {
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='main.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location = 'main.php';
        </script>";
    }
}
?>