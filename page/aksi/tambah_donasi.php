
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

    $campaign = $_POST['id_campaign'];
    $pesan = $_POST['pesan'];
    $bank = $_POST['bank'];
    $status_donasi = '0';
    $tanggal = date('Y/m/d', time());
    $jumlah_donasi = $_POST['jumlah_donasi'];
    $id_donatur= $_SESSION['id_donatur'];


		if ($pesan=="") {
		echo "<script>alert('pesan harus diisi'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
		# code....
	}elseif ($tanggal=="") {
		echo "<script>alert('Data tanggal harus diisi'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
		# code...
	}elseif ($jumlah_donasi=="") {
		echo "<script>alert('Jumlah donasi harus diisin'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
		# code...
	}elseif (!is_numeric($jumlah_donasi)) {
		echo "<script>alert('Jumlah donasi harus berupa numeric'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
	}else{
		$path = "../../assets/upload/" . $namaGambar;
 

        //masukan donasi
    if ($tipe_file == "image/jpeg" || $tipe_file = "image/png") {
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_donasi( id_campaign, pesan, id_bank, gambar, tanggal, jumlah_donasi, status_donasi, id_donatur) 
                VALUES ('$campaign','$pesan','$bank','$namaGambar','$tanggal','$jumlah_donasi','$status_donasi', '$id_donatur')");
                
                if ($QuerySimpan) {
                    echo "
                    <script>
                        alert('Donasi berhasil Terimakasih !');
                        window.location = '$base_url'+'index.php';
                    </script>";
                } else {
                    echo "
                    <script>
                        alert('Data gagal disimpan');
                        // window.location = '$base_url'+'page/donatur/donasi.php';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Data gambar gagal');
                    window.location = '$base_url'+'page/donatur/donasi.php';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Data gambar terlalu besar');
                window.location = '$base_url'+'page/donatur/donasi.php';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Type gambar salah');
            window.location = '$base_url'+'page/donatur/donasi.php';
        </script>";
			}
		}
		
	}
	

?>