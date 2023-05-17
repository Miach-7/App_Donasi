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
header("Content-Disposition: attachment; filename=Laporan Pencairan.xls");
?>



<h4>Laporan data Pencairan Dana</h4>
<table border="1">
    <thead>
        <tr>
            <th>ID Pencairan</th>
            <th>ID Campaign</th>
            <th>Nama Pencair</th>
            <th>Alasan</th>
            <th>Jumlah Pencairan</th>
            <th>tanggal</th>
            <th>Bank</th>
            <th>No Rekening</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
    </thead>
    <tbody>
        <?php
        $id = 1;
        $QueryDate = mysqli_query($koneksi, 
        "SELECT * FROM (((tbl_pencairan tt 
        INNER JOIN tbl_campaigner tp ON tt.id_campaigner = tp.id_campaigner) 
        INNER JOIN tbl_campaign ttbs ON tt.id_campaign = ttbs.id_campaign) 
        INNER JOIN tbl_bank ttbbs ON tt.id_bank = ttbbs.id_bank)
        WHERE tt.tanggal  
        BETWEEN '$mulai' AND '$selesai'");
             while ($row = mysqli_fetch_array($QueryDate)) {
        ?>
        <tr>
            <td class="font-weight-600"><?= $row['id_pencairan']; ?></td>
            <td class="font-weight-600"><?= $row['id_campaign']; ?></td>
            <td class="font-weight-600"><?= $row['nama_penerima']; ?></td>
            <td class="font-weight-600"><?= $row['alasan']; ?></td>
            <td class="font-weight-600">Rp.<?= number_format($row['dana_cair']); ?></td>
            <td class="font-weight-600"><?= $row['tanggal']; ?></td>
            <td class="font-weight-600"><?= $row['nama_bank']; ?></td>
            <td class="font-weight-600"><?= $row['no_rek']; ?></td>
            <td>
                <?php
                         $status = $row['status_pencairan'];
                          if ($row['status_pencairan'] == '0') {
                             $status = 'Proses';
                         } elseif ($row['status_pencairan'] == '1') {
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
