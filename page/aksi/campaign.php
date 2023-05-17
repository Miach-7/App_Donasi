
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

    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $status_campaign = '0';
    $dana_terkumpul = '0';
    $deskripsi_campaign = $_POST['deskripsi_campaign'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $tanggal_pembuatan = date('Y/m/d', time());
    $dana_target = $_POST['dana_target'];
    $id_campaigner = $_SESSION['id_campaigner'];
	
		if ($judul=="") {
		echo "<script>alert('nama produk harus diisi'); window.location = '../page/form_tambah_campaign.php';</script>";
		# code...
	}elseif ($deskripsi_campaign=="") {
		echo "<script>alert('Data deskripsi harus diisi'); window.location = ''../page/form_tambah_campaign.php';</script>";
        # code...
	}elseif ($tanggal_selesai=="") {
		echo "<script>alert('Data tanggal harus diisi'); window.location = ''../page/form_tambah_campaign.php';</script>";
		# code...
	}elseif ($dana_target=="") {
		echo "<script>alert('Target dana harus diisin'); window.location = ''../page/form_tambah_campaign.php';</script>";
		# code...
	}elseif (!is_numeric($dana_target)) {
		echo "<script>alert('Target dana harus berupa numeric'); window.location = ''../page/form_tambah_campaign.php';
				</script>";
	}else{
		$path = "../../assets/upload/" . $namaGambar;


    if ($tipe_file == "image/jpeg" || $tipe_file = "image/png") {
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_campaign( id_kategori, judul, deskripsi_campaign, gambar, tanggal_pembuatan, tanggal_selesai, dana_target, status_campaign, id_campaigner, dana_terkumpul) 
                VALUES ('$kategori','$judul','$deskripsi_campaign','$namaGambar','$tanggal_pembuatan','$tanggal_selesai','$dana_target','$status_campaign', '$id_campaigner', '$dana_terkumpul')");
                
                if ($QuerySimpan) {
                    echo "
                    <script>
                        alert('Data berhasil disimpan');
                        window.location = '../../page/campaigner/tampil.php';
                    </script>";
                } else {
                    echo "
                    <script>
                        alert('Data gagal disimpan');
                        // window.location = '../campaigner/form/tambah_campaign.php';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Data gambar gagal');
                    window.location = ../campaigner/form/tambah_campaign.php';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Data gambar terlalu besar');
                window.location = ../campaigner/form/tambah_campaign.php';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Type gambar salah');
            window.location = ../campaigner/form/tambah_campaign.php';
        </script>";
			}
		}
		
	}
	

?>