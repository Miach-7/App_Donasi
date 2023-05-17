<?php
include "../../header.php";
?>

<?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
$id_pencairan = $_GET['id_pencairan'];
$QueryEdit = mysqli_query($koneksi, "SELECT  * FROM (tbl_pencairan tt INNER JOIN tbl_campaign tp ON tt.id_campaign = tp.id_campaign ) where id_pencairan = '$id_pencairan'");
$rowEdit = mysqli_fetch_array($QueryEdit);
  if ($rowEdit['status_pencairan'] == '0') {
  $status = 'Proses';
   } elseif ($rowEdit['status_pencairan'] == '1') {
  $status = 'Selesai';
   } 

  $id_pencairan = $rowEdit['id_pencairan'];
  $id_campaign = $rowEdit['id_campaign'];
  ?>
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Pencairan Dana</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali ke Daftar Campaigner <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                      <div class="card-body">
                      <form class="form-horizontal" action="aksi_edit.php" method="post">
                         <div class="box-body">
                            <div class="form-group">
                                 <label for="username" class="col-sm-4 control-label">Id Pencairan</label>
                                   <div class="col-sm-10">
                                   <input type="hidden" class="form-control" name="id_pencairan" value="<?= $id_pencairan; ?>">
                                     <input type="text" class="form-control" name="id_pencairan" value="<?= $id_pencairan; ?>" disabled>
                                       </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                  <label for="username" class="col-sm-4 control-label">Id Campaign</label>
                                    <div class="col-sm-10">
                                     <input type="hidden" class="form-control" name="id_campaign" value="<?= $id_campaign; ?>">
                                      <input type="text" class="form-control" name="id_campaign" value="<?= $id_campaign; ?>" disabled>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_campaigner" class="col-sm-4 control-label">Status Campaign</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="status" id="status">
                                          <option value="<?= $rowEdit['status_pencairan']; ?>"><?= $status; ?></option>
                                          <option value="0">Proses</option>
                                          <option value="1">Selesai</option>
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
<?php
include "../../footer.php";
?>