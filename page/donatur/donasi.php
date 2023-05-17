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
                                    <h4>Data Donatur</h4>
                                </div>
                                <?php
                                 $id_donatur = $_SESSION['id_donatur'];
                                 $QueryProfile = mysqli_query($koneksi, "SELECT * FROM tbl_donatur  WHERE id_donatur = '$id_donatur'");
                                $row = mysqli_fetch_assoc($QueryProfile);
                                    ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Donatur</label>
                                        <input type="text" class="form-control" value="<?= $row['nama_donatur'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?= $row['email'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telpon</label>
                                        <input type="text" class="form-control" value="<?= $row['no_telpon'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" value="<?= $row['alamat'] ?>" disabled>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h3>No Transer Bank</h3><br>
                                        <h4>Mandiri </h4>
                                        <label> 8890802001287578</label>
                                        <h4>BRI  </h4>
                                        <label> 8890802001287578</label>
                                        <h4>BCA  </h4>
                                        <label> 8890802001287578</label>
                                    </div> 
                                        <div class="card-footer text-right">

                                     </div>                                                                      
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <form action="<?php echo $base_url; ?>page/aksi/tambah_donasi.php" method="POST" enctype="multipart/form-data">
                                <div class="card-header">
                                    <h4>Data Donasi</h4>
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
                                        <label for="jumlah_donasi" class="col-sm-4 control-label">Jumlah Donasi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jumlah_donasi"
                                                placeholder="jumlah_donasi">
                                            <input type="hidden" class="form-control" name="id_campaign"
                                                value="<?php echo $id_campaign ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_campaign" class="col-sm-4 control-label">Pesan</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="pesan"
                                                placeholder="pesan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar" class="col-sm-4 control-label">Bukti Transfer</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="gambar">
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