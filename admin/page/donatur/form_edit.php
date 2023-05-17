<?php
include "../../header.php";
?>

<?php
  include "../../lib/config.php";
  include "../../lib/koneksi.php";
$idDonatur = $_GET['id_donatur'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_donatur WHERE id_donatur = '$idDonatur'");
$row = mysqli_fetch_array($QueryEdit);
$idDonatur = $row['id_donatur'];
$username = $row['username'];
$nama_donatur = $row['nama_donatur'];
$email = $row['email'];
$password = $row['password'];
$no_telpon = $row['no_telpon'];

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4>Edit Donatur</h4>
            <div class="card-header-action">
              <a href="main.php" class="btn btn-danger">Kembali ke Daftar Donatur <i
                  class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="aksi_edit.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="username" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_donatur" value="<?= $idDonatur; ?>">
                    <input type="text" class="form-control" name="username" value="<?= $username; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="nama_donatur" class="col-sm-4 control-label">Nama Donatur</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_donatur" name="nama_donatur"
                    value="<?= $nama_donatur; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" value="<?= $password; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="no_telp" class="col-sm-2 control-label">No Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?= $no_telpon; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

  </section>
</div>

<?php
include "../../footer.php";
?>