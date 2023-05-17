<?php
include "../../header.php"; ?>
<div class="main-content">
<section class="section">

<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Manajemen Bank</h4>
                  <div class="card-header-action">
                    <a href="form_tambah.php" class="btn btn-danger">Tambah Bank <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                 <?php  
                    $QueryBank = mysqli_query($koneksi, "SELECT * FROM tbl_bank");
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th>ID Bank</th>
                        <th>Nama Bank</th>
                        <th>Action</th>
                      </tr>
                      <?php 
                      while ($row = mysqli_fetch_array($QueryBank)) {
                      ?>
                      <tr>
                        <td class="font-weight-600"><?= $row['id_bank']; ?></td>
                        <td class="font-weight-600"><?= $row['nama_bank']; ?></td> 
                        <td>
                          <a href="form_edit.php?id_bank=<?= $row['id_bank']; ?>">
                              <button class="btn btn-primary">Edit<i class="mdi mdi-pencil"></i></button>
                            </a>

                           <a href="aksi_hapus.php?id_bank=<?= $row['id_bank']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                <button class="btn btn-danger"> Hapus <i class="mdi mdi-power"></i></button>
                            </a>
                        </td>
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