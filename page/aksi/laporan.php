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
            <th>Nama Donatur</th>
            <th>Jumlah Donasi</th>
            <th>Pesan</th>
            <th>Transfer Bank</th>
            <th>Tanggal Donasi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        $QueryDate = mysqli_query($koneksi, 
        "SELECT * FROM((tbl_donasi tt 
        INNER JOIN tbl_donatur tp ON tt.id_donatur = tp.id_donatur) 
        INNER JOIN tbl_bank ttbs ON tt.id_bank = ttbs.id_bank)
        WHERE tt.tanggal  
        BETWEEN '$mulai' AND '$selesai'");
             while ($row = mysqli_fetch_array($QueryDate)) {
        ?>
        <tr>
            <td class="font-weight-600"><?= $row['id_donasi']; ?></td>
            <td class="font-weight-600"><?= $row['nama_donatur']; ?></td>
            <td class="font-weight-600">Rp.<?= number_format($row['jumlah_donasi']); ?></td>  
            <td class="font-weight-600"><?= $row['pesan']; ?></td>
            <td class="font-weight-600"><?= $row['nama_bank']; ?></td> 
            <td class="font-weight-600"><?= $row['tanggal']; ?></td>
            <td>
                <?php
                  $status = $row['status_donasi'];
                  if ($row['status_donasi'] == '0') {
                      $status = 'Belum Tervertifikasi';
                  } elseif ($row['status_donasi'] == '1') {
                      $status = 'Sudah Tervertifikasi';
                  }  elseif ($row['status_donasi'] == '2') {
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
