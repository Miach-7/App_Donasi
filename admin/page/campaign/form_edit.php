<?php
include "../../header.php";
?>

<?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
$id_campaign = $_GET['id_campaign'];
$QueryEdit = mysqli_query($koneksi, "SELECT  * FROM tbl_campaign where id_campaign = '$id_campaign'");
$rowEdit = mysqli_fetch_array($QueryEdit);
  if ($rowEdit['status_campaign'] == '0') {
  $status = 'Belum divertifikasi';
   } elseif ($rowEdit['status_campaign'] == '1') {
  $status = 'Sudah Tervertifikasi';
   } elseif ($rowEdit['status_campaign'] == '2') {
    $status = 'Selesai';
} 
  $id_campaign = $rowEdit['id_campaign'];
  ?>
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Campaigner</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali ke Daftar Campaigner <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                      <div class="card-body">
                      <form class="form-horizontal" action="aksi_edit.php" method="post">
                         <div class="box-body">
                            <div class="form-group">
                                 <label for="username" class="col-sm-4 control-label">Id Campaign</label>
                                   <div class="col-sm-10">
                                   <input type="hidden" class="form-control" name="id_campaign" value="<?= $id_campaign; ?>">
                                     <input type="text" class="form-control" name="id_campaign" value="<?= $id_campaign; ?>" disabled>
                                       </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_campaigner" class="col-sm-4 control-label">Status Campaign</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="status" id="status">
                                          <option value="<?= $rowEdit['status_campaign']; ?>"><?= $status; ?></option>
                                          <option value="0">Belum Tervertifikasi</option>
                                          <option value="1">Sudah Tervertifikasi</option>
                                          <option value="2">Selesai</option>
                                        </select>
                                      </div>
                                 </div>                                
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Simpan</button>
                          </div>
                     </form>
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-45">
              <div class="card">
                <div class="card-header">
                  <h4>Detail Campaign</h4>
                  <div class="card-header-action">
                   
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                 <?php 
                    $QueryCampaigner = mysqli_query($koneksi, "SELECT * FROM tbl_campaign where id_campaign = '$id_campaign'");
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>gambar</th>
                        <th>Dana Target</th>
                        <th>Dana Terkumpul</th>
                        <th>Sisa Waktu</th>
                      </tr>
                      <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
                        $tgl1 = new DateTime($row['tanggal_selesai']);
                        $tgl2 = new DateTime();
                        $d = $tgl2->diff($tgl1)->days ;
                      ?>
                      <tr>
                        <td class="font-weight-600"><?= $row['judul']; ?></td>
                        <td class="font-weight-600"><?= $row['deskripsi_campaign']; ?></td>
                        <td class="font-weight-600"><img src="../../../assets/upload/<?= $row['gambar']; ?>" alt="" height="80" width="120"></td> 
                        <td class="font-weight-600">Rp.<?= number_format($row['dana_target']); ?></td>  
                        <td class="font-weight-600">Rp.<?= number_format($row['dana_terkumpul']); ?></td> 
                        <td class="font-weight-600">Tersisa <?php echo $d ?> Hari</td> 
                           
                      </tr>
                      <?php }?>        
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        
        </section>
      </div>

<?php
include "../../footer.php";
?>