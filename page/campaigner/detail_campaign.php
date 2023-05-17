<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
$id_campaign = $_GET['id_campaign'];
$Query = mysqli_query($koneksi, "SELECT  * FROM tbl_campaign where id_campaign = '$id_campaign'");
$row = mysqli_fetch_array($Query);
$persen = $row['dana_terkumpul']/$row['dana_target'] * 100;
$tgl1 = new DateTime($row['tanggal_selesai']);
$tgl2 = new DateTime();
$d = $tgl2->diff($tgl1)->days ;
?>
<?php 
include "../../template/header.php";
?>
<br><br><br><br>
<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt active" href="#product-1">
                            <img src="../../assets/upload/<?php echo $row['gambar']?>" alt=""
                                style="width:500px;height:400px;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3><?php echo $row['judul']?></h3>
                    <p>Raised: Rp.<?php echo number_format ($row['dana_terkumpul'])?> </p>
                    <div class="custom_progress_bar">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width:<?php echo $persen ?>%;"
                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                <span class="progres_count">
                                    <?php echo $persen ?>%
                                </span>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <p>Goal: Rp.<?php echo number_format ($row['dana_target'])?> </p>
                        <p>Tersisa <?php echo $d?> Hari lagi Campaign akan berakhir </p><br>

                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h4>Description</h4>
                            <p><?php echo $row['deskripsi_campaign']?></p>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="donate_now_btn text-center">
                                    <a href="../donatur/donasi.php?id_campaign=<?= $row['id_campaign']; ?>" class="boxed-btn4">Donate Now</a>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
</section>
<!-- Product Details Section End -->\
<?php 
include "../../template/header.php";
?>