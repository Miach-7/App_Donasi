<?php
include "../../header.php";
?>

<?php

$idKategori = $_GET['id_kategori'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE id_kategori = '$idKategori'");
$row = mysqli_fetch_array($QueryEdit);
$idKategori = $row['id_kategori'];
$namaKategori = $row['nama_kategori'];
?>
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Kategori</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali ke Daftar Kategori <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                      <div class="card-body">
                      <form class="form-horizontal" action="aksi_edit.php" method="post">
                         <div class="box-body">
                            <div class="form-group">
                                 <label for="namaKategori" class="col-sm-4 control-label">Nama Kategori</label>
                                   <div class="col-sm-10">
                                     <input type="hidden" class="form-control" name="id_kategori" value="<?= $idKategori; ?>">
                                     <input type="text" class="form-control" name="nama_kategori" value="<?= $namaKategori; ?>">
                                       </div>
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