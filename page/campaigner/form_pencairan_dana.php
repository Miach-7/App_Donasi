<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
$id_campaign = $_GET['id_campaign'];

?>
<?php 
include "../../template/header.php";
?>
<br><br><br>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form>
                                <div class="card-header">
                                    <h4>Data Campaign</h4>
                                </div>
                                <?php
                                 $QueryCampaign = mysqli_query($koneksi, "SELECT * FROM tbl_campaign  WHERE id_campaign = '$id_campaign'");
                                $row = mysqli_fetch_assoc($QueryCampaign);
                                    ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Judul</label>
                                          <input type="text" class="form-control" value="<?= $row['judul'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                     <label>Deskripsi</label>
                                         <textarea type="text" class="form-control" value="" disabled><?= $row['deskripsi_campaign'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Dana Terkumpul</label>
                                        <input type="text" class="form-control" value="<?= $row['dana_terkumpul'] ?>" disabled>
                                    </div>         
                                    <br> 
                                        <div class="card-footer text-right">

                                     </div>                                                                      
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form action="<?php echo $base_url; ?>page/aksi/pencairan_dana.php" method="POST" enctype="multipart/form-data">
                                <div class="card-header">
                                    <h4>Data Pencairan Dana</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bank" class="col-sm-4 control-label">Transfer Lewat</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="bank">
                                                <option value="">Pilih Bank</option>
                                                <?php
                                                 include "../../lib/koneksi.php";
                                                 $QueryBank = mysqli_query($koneksi, "SELECT * FROM tbl_bank");
                                                 while ($bank = mysqli_fetch_array($QueryBank)) {
                                                    ?>
                                                <option value="<?= $bank['id_bank']; ?>"><?= $bank['nama_bank']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_rekening" class="col-sm-4 control-label">No rekening</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_rek" placeholder="nomor rekening">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="penerima" class="col-sm-8 control-label">Dana yang Ingin dicairkan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dana_cair" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alasan" class="col-sm-4 control-label">Alasan Pencairan Dana</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="alasan" placeholder="alasan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="penerima" class="col-sm-4 control-label">Penerima dana</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="penerima" placeholder="nama sesuai dengan yang terdapat pada rekening">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="username" class="col-sm-4 control-label"></label>
                                       <div class="col-sm-10">
                                         <input type="hidden" class="form-control" name="id_campaign" value="<?= $id_campaign; ?>">
                                      </div>
                                    </div>      
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
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