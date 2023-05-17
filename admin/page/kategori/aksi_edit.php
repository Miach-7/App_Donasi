<?php
session_start();
if (empty($_SESSION['id_admin']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=<?php echo $admin_url; ?>index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");
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