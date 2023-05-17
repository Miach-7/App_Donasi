<?php
include "../../header.php"; ?>
<div class="main-content">
<section class="section">

<div class="row">
            <div class="col-md-16">
              <div class="card">
                <div class="card-header">
                  <h4>Manajemen Campaigner</h4>
                  <div class="card-header-action">
                    <a href="form_tambah.php" class="btn btn-danger">Cetak Laporan <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                 <?php  
                    $QueryCampaigner = mysqli_query($koneksi, "SELECT * FROM tbl_campaigner ");
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th>ID Campaigner</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <!-- <th>Action</th> -->
                      </tr>
                      <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
                      ?>
                      <tr>
                        <td class="font-weight-600"><?= $row['id_campaigner']; ?></td>
                        <td class="font-weight-600"><?= $row['nama_campaigner']; ?></td>
                        <td class="font-weight-600"><?= $row['username']; ?></td> 
                        <td class="font-weight-600"><?= $row['email']; ?></td>
                        <td class="font-weight-600"><?= $row['no_telpon']; ?></td> 
                        <!-- <td>
                          <a href="form_edit.php?id_campaigner=<?= $row['id_campaigner']; ?>">
                              <button class="btn btn-primary">Edit<i class="mdi mdi-pencil"></i></button>
                            </a>

                           <a href="aksi_hapus.php?id_campaigner=<?= $row['id_campaigner']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                <button class="btn btn-danger"> Hapus <i class="mdi mdi-power"></i></button>
                            </a>
                        </td> -->
                      </tr>
                      <?php }?>        
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        

<?php include "../../footer.php"; ?>