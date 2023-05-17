<?php
session_start();
if (empty($_SESSION['id_admin']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=<?php echo $admin_url; ?>index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";
    
    $id_bank = $_POST['id_bank'];
    $nama_bank = $_POST['nama_bank'];

    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_bank SET nama_bank = '$nama_bank' WHERE id_bank = '$id_bank'");
    if ($QueryEdit) {
        echo "
        <script>
            alert('Data berhasil dirubah');
          window.location='main.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dirubah');
            window.location='main.php';
        </script>";
    }
}
    ?>