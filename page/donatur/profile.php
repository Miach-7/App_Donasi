
<?php
include "../../lib/koneksi.php";
include "../../lib/config.php";
?>
<?php 
session_start();
include "../../template/header.php";
?>
<?php
$nama_donatur = $_SESSION['nama_donatur'];
$id_donatur = $_SESSION['id_donatur'];
$Query = mysqli_query($koneksi, "SELECT * FROM tbl_donatur WHERE id_donatur = '$id_donatur'");
$row = mysqli_fetch_array($Query);

?>
<br><br><br>
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Hello <?= $row['nama_donatur']; ?></h4>
                      <a href="<?php echo $base_url; ?>page/donatur/edit_profile.php?id_donatur=<?= $row['id_donatur']; ?>">
                           <button class="btn btn-primary">Edit<i class="mdi mdi-pencil"></i></button>
                       </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['nama_donatur']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['username']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['password']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['no_telpon']; ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
          </div>
        </div>
    </div>
<?php 
include "../../template/header.php";
?>