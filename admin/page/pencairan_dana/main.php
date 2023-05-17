<?php
include "../../header.php"; ?>
<div class="main-content">
<section class="section">

<div class="row">
            <div class="col-md-45">
              <div class="card">
                <div class="card-header">
                <h4>Manajemen Pencairan Dana</h4>
                  <div class="card-header-action">
                  <a href="laporan.php" class="btn btn-danger" data-toggle="modal" data-target="#laporanCampaign">Cetak Laporan <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                  <div class="table-responsive table-invoice">
                 <?php 
                    $QueryCampaigner = mysqli_query($koneksi,  "SELECT * FROM (((tbl_pencairan tt INNER JOIN tbl_campaigner tp ON tt.id_campaigner = tp.id_campaigner) INNER JOIN tbl_campaign ttbs ON tt.id_campaign = ttbs.id_campaign) INNER JOIN tbl_bank ttbbs ON tt.id_bank = ttbbs.id_bank) GROUP BY tt.id_pencairan ASC");
                    ?>
                    <table class="table table-striped">
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
                      <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
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
                        <td>
                          <a href="form_edit.php?id_pencairan=<?= $row['id_pencairan']; ?>">
                              <button class="btn btn-primary">Edit<i class="mdi mdi-pencil"></i></button>
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
                  <h4 class="modal-title">Laporan Pencairan</h4>
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