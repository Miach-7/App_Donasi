<?php
include "../../header.php";
?>

<?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
$id_donasi = $_GET['id_donasi'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM ((tbl_donasi tt INNER JOIN tbl_donatur tp ON tt.id_donatur = tp.id_donatur) INNER JOIN tbl_campaign ttbs ON tt.id_campaign = ttbs.id_campaign) WHERE tt.id_donasi = '$id_donasi'");
$rowEdit = mysqli_fetch_array($QueryEdit);
  if ($rowEdit['status_donasi'] == '0') {
  $status = 'Belum divertifikasi';
   } elseif ($rowEdit['status_donasi'] == '1') {
  $status = 'Sudah Tervertifikasi';
   } elseif ($rowEdit['status_donasi'] == '2') {
    $status = 'Selesai';
} 
  $id_donasi = $rowEdit['id_donasi'];
  $id_campaign = $rowEdit['id_campaign'];
  $judul = $rowEdit['judul'];
  $nama = $rowEdit['nama_donatur'];
  $donasi = $rowEdit['jumlah_donasi'];
  ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4>Vertifikasi Donasi</h4>
            <div class="card-header-action">
              <a href="main.php" class="btn btn-danger">Kembali ke Daftar Donasi <i
                  class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="aksi_edit.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="username" class="col-sm-4 control-label">Id Donasi</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_donasi" value="<?= $id_donasi; ?>">
                    <input type="text" class="form-control" name="id_donasi" value="<?= $id_donasi; ?>" disabled>
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
                <label for="nama_campaigner" class="col-sm-4 control-label">Status Donasi</label>
                <div class="col-sm-10">
                  <select class="form-control" name="status" id="status">
                    <option value="<?= $rowEdit['status_donasi']; ?>"><?= $status; ?></option>
                    <option value="0">Belum Tervertifikasi</option>
                    <option value="1">Sudah Tervertifikasi</option>
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
    </div>
</section>
<div class="row">
            <div class="col-md-45">
              <div class="card">
                <div class="card-header">
                  <h4>Detail donasi</h4>
                  <div class="card-header-action">
                   
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                 <?php 
                     $QueryCampaigner = mysqli_query($koneksi, "SELECT * FROM ((tbl_donasi tt INNER JOIN tbl_bank tp ON tt.id_bank = tp.id_bank) INNER JOIN tbl_donatur ttbs ON tt.id_donatur = ttbs.id_donatur) WHERE tt.id_donasi = '$id_donasi'");
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th>Nama Donatur</th>
                        <th>jumlah donasi</th>
                        <th>Bukti transfer</th>
                        <th>Tanggal Donasi</th>
                        <th>pesan</th>
                        <th>Transfer dengan bank</th>
                      </tr>
                      <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
                      ?>
                      <tr>
                        <td class="font-weight-600"><?= $row['nama_donatur']; ?></td>
                        <td class="font-weight-600"><?= $row['jumlah_donasi']; ?></td>
                        <td class="font-weight-600"><img src="../../../assets/upload/<?= $row['gambar']; ?>" alt="" height="80" width="120"></td> 
                        <td class="font-weight-600"><?= $row['tanggal']; ?></td>
                        <td class="font-weight-600"><?= $row['pesan']; ?></td> 
                        <td class="font-weight-600"><?= $row['nama_bank']; ?></td> 
                           
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