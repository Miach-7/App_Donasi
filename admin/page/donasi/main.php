<?php
include "../../header.php"; 
?>
<div class="main-content">
  <section class="section">

    <div class="row">
      <div class="col-md-45">
        <div class="card">
          <div class="card-header">
            <h4>Manajemen Donasi</h4>
            <div class="card-header-action">
            <a href="laporan.php" class="btn btn-danger" data-toggle="modal" data-target="#laporanCampaign">Cetak Laporan <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="table-responsive table-invoice">
            <?php 
                  $QueryDonasi = mysqli_query($koneksi, "SELECT * FROM ((tbl_donasi tt INNER JOIN tbl_donatur tp ON tt.id_donatur = tp.id_donatur) INNER JOIN tbl_campaign ttbs ON tt.id_campaign = ttbs.id_campaign) GROUP BY tt.id_donasi ASC");
                    ?>
            <table class="table table-striped">
              <tr>
                <th>ID Donasi</th>
                <th>Pesan</th>
                <th>Jumlah Donasi</th>
                <th>Status Donasi</th>
                <th>Action</th>
              </tr>
              <?php 
                      while ($row = mysqli_fetch_array($QueryDonasi)) {
                      ?>
              <tr>
                <td class="font-weight-600"><?= $row['id_donasi']; ?></td>
                <td class="font-weight-600"><?= $row['pesan']; ?></td>
                <td class="font-weight-600"><?= $row['jumlah_donasi']; ?></td>
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
                </td>
                <td>
                  <a href="form_edit.php?id_donasi=<?= $row['id_donasi']; ?>">
                    <button class="btn btn-primary">Detail<i class="mdi mdi-pencil"></i></button>
                  </a>
                </td>
              </tr>
              <?php }?>
            </table>
          </div>
        </div>
      </div>
    </div>


    <?php include "../../footer.php"; ?>

    
    <div class="modal fade" id="laporanCampaign">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Laporan Donasi</h4>
                </div>
                <form action="aksi_laporan.php" method="post">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tanggal Mulai</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="date" name="mulai" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tanggal Selesai</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                            </div>
                            <input type="date" name="selesai" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>