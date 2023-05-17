<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
$id_campaign = $_GET['id_campaign'];
?>
<?php 
include "../../template/header.php";
?>
<br><br>
<div class="main-body">
  <div class="row gutters-sm" style="display: contents" ;>
    <div class="col-md-12 mt-10 center">
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <?php 
                     $QueryCampaigner = mysqli_query($koneksi,  "SELECT * FROM ((tbl_donasi tt INNER JOIN tbl_donatur tp ON tt.id_donatur = tp.id_donatur) INNER JOIN tbl_bank ttbs ON tt.id_bank = ttbs.id_bank) WHERE tt.id_campaign = $id_campaign");
                    ?>
            <table class="table table-striped">
              <tr>
                <th>Nama Donatur</th>
                <th>jumlah donasi</th>
                <th>Tanggal Donasi</th>
                <th>pesan</th>
                <th>Tanggal Donasi</th>
                <th>Transfer dengan bank</th>
                <th>Status</th>
              </tr>
              <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
                      ?>
              <tr>
                <td class="font-weight-600"><?= $row['nama_donatur']; ?></td>
                <td class="font-weight-600">Rp.<?= number_format($row['jumlah_donasi']); ?></td>
                <td class="font-weight-600"><?= $row['tanggal']; ?></td>
                <td class="font-weight-600"><?= $row['pesan']; ?></td>
                <td class="font-weight-600"><?= $row['nama_bank']; ?></td>
                <td>
                  <?php
                         $status = $row['status_donasi'];
                          if ($row['status_donasi'] == '0') {
                             $status = 'Belum Tervertifikasi';
                         } elseif ($row['status_donasi'] == '1') {
                             $status = 'Sudah Tervertifikasi';
                         } 
                        echo $status;
                        ?>

              </tr>
              <?php }?>
            </table>
          </div>
        </div>
      </div>
    </div>


    </section>
  </div>
  <?php 
include "../../template/footer.php";
?>
