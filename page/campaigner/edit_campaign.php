<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>
<?php 
include "../../template/header.php";


$id_campaign = $_GET['id_campaign'];
$QueryEdit = mysqli_query($koneksi, "SELECT * FROM tbl_campaign WHERE id_campaign = '$id_campaign'");
$row = mysqli_fetch_array($QueryEdit);
$id_campaign = $row['id_campaign'];
$id_kategori = $row['id_kategori'];
$judul = $row['judul'];
$deskripsi_campaign = $row['deskripsi_campaign'];
$gambar = $row['gambar'];
$tanggal_selesai = $row['tanggal_selesai'];
$dana_target = $row['dana_target'];
?>
<br><br><br><br>
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="row">
        <div class="col-lg-8 offset-lg-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Campaign</h3>
                    </div>
                    <form class="form-horizontal" action="../aksi/edit_campaign.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id_campaign" value="<?= $id_campaign; ?>">
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
                                <label for="namaProduk" class="col-sm-2 control-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="judul" value="<?= $judul; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar" class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-10">
                               <!--<img src="../../assets/upload/<?php echo $row['gambar']?>" alt="">-->
                                    <input type="file" name="gambar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsiProduk" class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="deskripsi_campaign"><?= $deskripsi_campaign; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hargaPtanggalroduk" class="col-sm-2 control-label">Dana Target</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="dana_target"  value="<?= $dana_target; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal Selesai</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_selesai" value="<?= $tanggal_selesai; ?>">
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