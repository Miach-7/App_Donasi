<?php
session_start();
include "../../lib/koneksi.php";
include "../../lib/config.php";
?>
<?php
$nama_donatur = $_SESSION['nama_donatur'];
$id_donatur = $_SESSION['id_donatur'];
$Query = mysqli_query($koneksi, "SELECT * FROM tbl_donatur WHERE id_donatur = '$id_donatur'");
$row = mysqli_fetch_array($Query);
$idDonatur = $row['id_donatur'];
$username = $row['username'];
$nama_ = $row['nama_donatur'];
$email = $row['email'];
$password = $row['password'];
$no_telpon = $row['no_telpon'];

?>
<?php 
include "../../template/header.php";
?>
<!-- Register Section Begin -->
<br><br><br><br>
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="card">
          <div class="card-header">
            <h4>Profile Donatur</h4>
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="../aksi/edit_profile_donatur.php" method="post">
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
                <label for="nama_donatur" class="col-sm-8 control-label">Nama Donatur</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_donatur" name="nama_donatur"
                    value="<?= $nama_donatur; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" value="<?= $password; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="no_telp" class="col-sm-4 control-label">No Telepon</label>
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
    </div>
</section>
</div>
<?php 
include "../../template/footer.php";
?>