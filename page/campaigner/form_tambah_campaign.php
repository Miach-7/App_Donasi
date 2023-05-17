<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>
<?php 
include "../../template/header.php";
?>
<br><br><br>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
        <div class="col-lg-8 offset-lg-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Campaign</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo $base_url; ?>page/aksi/campaign.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kategori" class="col-sm-2 control-label">List Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kategori">
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        include "../../lib/koneksi.php";
                                        $QueryKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                        while ($kategori = mysqli_fetch_array($QueryKategori)) {
                                        ?>
                                            <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="judul" class="col-sm-2 control-label">Judul Campaign</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="judul" placeholder="judul">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="deskripsi_campaign" class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="deskripsi_campaign" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" name="gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal selesai</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal_selesai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dana_target" class="col-sm-2 control-label">Target Dana</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="dana_target" placeholder="target Dana">
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
include "../../template/footer.php";
?>