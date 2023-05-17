<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";

$mulai = date('Y/m/d', strtotime($_POST['mulai']));
$selesai = date('Y/m/d', strtotime($_POST['selesai']));

?>
<?php
header("Content-type: application/octet-stream");
header("Pragma: no-cache");
header("Expires: 0");
header("Content-Disposition: attachment; filename=Laporan Pemesanan.xls");
?>



<h4>Laporan data Campaign</h4>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Dana Target</th>
            <th>Dana Terkumpul</th>
            <th>Sisa Hari</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        $QueryDate = mysqli_query($koneksi, 
        "SELECT * FROM((tbl_campaign tt 
        INNER JOIN tbl_campaigner tp ON tt.id_campaigner = tp.id_campaigner) 
        INNER JOIN tbl_kategori ttbs ON tt.id_kategori = ttbs.id_kategori) 
        WHERE tt.tanggal_pembuatan  
        BETWEEN '$mulai' AND '$selesai'");


             while ($row = mysqli_fetch_array($QueryDate)) {
             $tgl1 = new DateTime($row['tanggal_selesai']);
             $tgl2 = new DateTime();
             $d = $tgl2->diff($tgl1)->days ;
        ?>
        <tr>
            <td class="font-weight-600"><?= $row['id_campaign']; ?></td>
            <td class="font-weight-600"><?= $row['judul']; ?></td>
            <td class="font-weight-600"><?= $row['deskripsi_campaign']; ?></td>
            <td class="font-weight-600"><?= $row['nama_kategori']; ?></td>
            <td class="font-weight-600">Rp.<?= number_format($row['dana_target']); ?></td>  
            <td class="font-weight-600">Rp.<?= number_format($row['dana_terkumpul']); ?></td> 
            <td class="font-weight-600">Tersisa <?php echo $d ?> Hari</td>
            <td class="font-weight-600"><?= $row['tanggal_pembuatan']; ?></td>
            <td>
                <?php
                  $status = $row['status_campaign'];
                  if ($row['status_campaign'] == '0') {
                      $status = 'Belum Tervertifikasi';
                  } elseif ($row['status_campaign'] == '1') {
                      $status = 'Sudah Tervertifikasi';
                  }  elseif ($row['status_campaign'] == '2') {
                       $status = 'Selesai';
                 }
                   echo $status;
                ?>
            </td>
        </tr>
        <?php $id++; 
    } ?>
    </tbody>
</table>
>