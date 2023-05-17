<?php
session_start();
include "../../lib/koneksi.php";
include "../../lib/config.php";
?>
<?php
$nama_campaigner = $_SESSION['nama_campaigner'];
$id_campaigner = $_SESSION['id_campaigner'];
$Query = mysqli_query($koneksi, "SELECT * FROM tbl_campaigner WHERE id_campaigner = '$id_campaigner'");
$row = mysqli_fetch_array($Query);

?>
<?php 
include "../../template/header.php";
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
                      <h4>Hello <?= $row['nama_campaigner']; ?></h4>
                      <a href="<?php echo $base_url; ?>page/campaigner/edit_profile.php?id_campaigner=<?= $row['id_campaigner']; ?>">
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
                    <?= $row['nama_campaigner']; ?>
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