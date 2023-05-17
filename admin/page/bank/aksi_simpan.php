

<?php
session_start();
if (empty($_SESSION['id_admin']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=<?php echo $admin_url; ?>index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $namaBank = $_POST['namaBank'];
  if($namaBank=="")
  {
      echo "
    <script>
        alert('Data Bank harus diisi');
        window.location='form_tambah.php';
    </script>";
  }
  else
  {
       $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_bank (nama_bank) VALUES ('$namaBank')");
    if ($QuerySimpan) {
        echo "
    <script>
        alert('Data berhasil disimpan');
        window.location='main.php';
    </script>";
    } else {
        echo "
    <script>
        alert('Data gagal disimpan');
        window.location='form_tambah.php';
    </script>";
    }
  }
 }
