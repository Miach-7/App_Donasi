<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Anda harus login terlebih dahulu<br>";
    echo "<a href=../../index.php>Klik disini untuk Login</a></center>";
} else {
    include "../../lib/config.php";
    include "../../lib/koneksi.php";


    
    $id_campaign = $_POST['id_campaign'];
    $no_rek = $_POST['no_rek'];
    $dana_cair = $_POST['dana_cair'];
    $alasan = $_POST['alasan'];
    $bank = $_POST['bank'];
    $penerima_dana = $_POST['penerima'];
    $status_pencairan = '0';
    $tanggal = date('Y/m/d', time());
    $id_campaigner = $_SESSION['id_campaigner'];


	// 	if ($bank=="") {
	// 	echo "<script>alert('pesan harus diisi'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
	// 	# code....
	// }elseif ($no_rek=="") {
	// 	echo "<script>alert('Data tanggal harus diisi'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
	// 	# code...
	// }elseif ($dana_cair >= $dana_terkumpul) {
	// 	echo "<script>alert('Jumlah donasi harus diisin'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
    //     # code...
    // }elseif ($dana_cair=="") {
    //     echo "<script>alert('Jumlah donasi harus diisin'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
    //      # code...
	// }else (!is_numeric($dana_cair)) {
    //     echo "<script>alert('Jumlah donasi harus berupa numeric'); window.location =  '$base_url'+'page/donatur/donasi.php';</script>";
    //      # code...
	// }

        //masukan donasi
                $QuerySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pencairan( id_campaign, id_campaigner, id_bank, no_rek, dana_cair, alasan, nama_penerima, tanggal, status_pencairan) 
                VALUES ('$id_campaign','$id_campaigner','$bank','$no_rek','$dana_cair','$alasan','$penerima_dana', '$tanggal', '$status_pencairan')");
                
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
            } 


?>