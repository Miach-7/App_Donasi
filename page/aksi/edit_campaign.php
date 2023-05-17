<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $namaGambar = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../../assets/upload/" . $namaGambar;

    $id_campaign = $_POST['id_campaign'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $deskripsi_campaign = $_POST['deskripsi_campaign'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $dana_target = $_POST['dana_target'];


    if (empty($error)) {
        if ($tipe_file == "image/jpeg" || $tipe_file = "image/png") {
            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $QueryEdit = mysqli_query($koneksi, " UPDATE tbl_campaign SET id_kategori = '$kategori', judul = '$judul', deskripsi_campaign = '$deskripsi_campaign', gambar = '$namaGambar', tanggal_selesai = '$tanggal_selesai', dana_target = '$dana_target' WHERE id_campaign = '$id_campaign'");
                    if ($QueryEdit) {
                        echo "
                    <script>
                        alert('Data berhasil dirubah');
                        window.location = '$base_url'+'page/campaigner/list_campaign.php';
                    </script>";
                    } else {
                        echo "
                    <script>
                        alert('Data gagal dirubah');
                        window.location = '$base_url'+'page/campaigner/edit_campaign.php?id_campaign='+'$id_campaign';
                    </script>";
                    }
                } else {
                    echo "
                <script>
                    alert('Data gambar gagal');
                    window.location = '$base_url'+'page/campaigner/edit_campaign.php?id_campaign='+'$id_campaign';
                </script>";
                }
            } else {
                echo "
            <script>
                alert('Data gambar terlalu besar');
                window.location = '$base_url'+'page/campaigner/edit_campaign.php?id_campaign='+'$id_campaign';
            </script>";
            }
        } else {
            echo "
        <script>
            alert('Type gambar salah');
            window.location = '$admin_url'+'page/campaigner/edit_campaign.php?id_campaign='+'$id_campaign';
            </script>";
        }
    }
}
