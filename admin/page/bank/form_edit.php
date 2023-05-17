<?php
include "../../header.php";
?>

<?php

$idBank = $_GET['id_bank'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_bank WHERE id_bank = '$idBank'");
$row = mysqli_fetch_array($QueryEdit);
$idBank = $row['id_bank'];
$namaBank = $row['nama_bank'];
?>
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Bank</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali ke Daftar Bank <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                      <div class="card-body">
                      <form class="form-horizontal" action="aksi_edit.php" method="post">
                         <div class="box-body">
                            <div class="form-group">
                                 <label for="namaBank" class="col-sm-4 control-label">Nama Bank</label>
                                   <div class="col-sm-10">
                                     <input type="hidden" class="form-control" name="id_bank" value="<?= $idBank; ?>">
                                     <input type="text" class="form-control" name="nama_bank" value="<?= $namaBank; ?>">
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