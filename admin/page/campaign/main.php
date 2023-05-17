<?php
include "../../header.php"; ?>
<div class="main-content">
  <section class="section">

    <div class="row">
      <div class="col-md-45">
        <div class="card">
          <div class="card-header">
            <h4>Manajemen Campaign</h4>
            <div class="card-header-action">
              <a href="laporan.php" class="btn btn-danger" data-toggle="modal" data-target="#laporanCampaign">Cetak Laporan <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive table-invoice">
              <?php 
                    $QueryCampaigner = mysqli_query($koneksi, "SELECT * FROM ((tbl_campaign tt INNER JOIN tbl_campaigner tp ON tt.id_campaigner = tp.id_campaigner) INNER JOIN tbl_kategori ttbs ON tt.id_kategori = ttbs.id_kategori) GROUP BY tt.id_campaign ASC");
                    ?>
              <table class="table table-striped">
                <tr>
                  <th>ID Campaign</th>
                  <th>Nama Campaigner</th>
                  <th>tanggal Pembuatan</th>
                  <th>Kategori campaign</th>
                  <th>Sisa Waktu</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
                        $tgl1 = new DateTime($row['tanggal_selesai']);
                        $tgl2 = new DateTime();
                        $d = $tgl2->diff($tgl1)->days ;
                      ?>
                <tr>
                  <td class="font-weight-600"><?= $row['id_campaign']; ?></td>
                  <td class="font-weight-600"><?= $row['nama_campaigner']; ?></td>
                  <td class="font-weight-600"><?= $row['tanggal_pembuatan']; ?></td>
                  <td class="font-weight-600"><?= $row['nama_kategori']; ?></td>
                  <td class="font-weight-600">Tersisa <?php echo $d ?> Hari</td>
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
                  <td>
                    <a href="form_edit.php?id_campaign=<?= $row['id_campaign']; ?>">
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
                  <h4 class="modal-title">Laporan Campaign</h4>
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