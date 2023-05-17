<?php
include "../../header.php"; ?>
<div class="main-content">
<section class="section">

<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Manajemen Kategori</h4>
                  <div class="card-header-action">
                    <a href="form_tambah.php" class="btn btn-danger">Tambah Kategori <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                 <?php  
                    $QueryKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                      </tr>
                      <?php 
                      while ($row = mysqli_fetch_array($QueryKategori)) {
                      ?>
                      <tr>
                        <td class="font-weight-600"><?= $row['id_kategori']; ?></td>
                        <td class="font-weight-600"><?= $row['nama_kategori']; ?></td> 
                        <td>
                          <a href="form_edit.php?id_kategori=<?= $row['id_kategori']; ?>">
                              <button class="btn btn-primary">Edit<i class="mdi mdi-pencil"></i></button>
                            </a>

                           <a href="aksi_hapus.php?id_kategori=<?= $row['id_kategori']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
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