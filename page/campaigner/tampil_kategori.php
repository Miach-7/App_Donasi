<?php
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>
<?php 
session_start();
include "../../template/header.php";
?>

<!-- popular_causes_area_start  -->
<div class="popular_causes_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_title text-center mb-55">
                    <h3><span>Donate Now</span></h3>
                </div>
            </div>
        </div>
        <div class="section" style="display:flex;">
            <div class="card" style="display: contents";>
                <?php
                $id_kategori = $_GET['id_kategori'];
                $q = mysqli_query($koneksi, "SELECT * FROM tbl_campaign WHERE status_campaign = '1' AND id_kategori = '$id_kategori'");
                    while ($r = mysqli_fetch_array($q))
               {
                $persen = $r['dana_terkumpul']/$r['dana_target'] * 100;

	            $tgl1 = new DateTime($r['tanggal_selesai']);
	            $tgl2 = new DateTime();
	            $d = $tgl2->diff($tgl1)->days ;
                  ?>
                <div class="col-md-4">
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="../../assets/upload/<?php echo $r['gambar']?>" alt="">
                        </div>
                        <div class="causes_content">
                            <div class="custom_progress_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width:<?php echo $persen ?>"%;
                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                        <span class="progres_count">
                                            <?php echo $persen ?>%
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="balance d-flex justify-content-between align-items-center">
                                <span>Raised: Rp.<?php echo number_format ($r['dana_terkumpul'])?> </span>
                                <span>Tersisa <?php echo $d?> Hari lagi </span>
                            </div>
                            <h4><?php echo $r['judul']?></h4>
                            <p><?php echo $r['deskripsi_campaign']?></p>
                            <a class="read_more" href="detail_campaign.php?id_campaign=<?= $r['id_campaign']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php 
include "../../template/footer.php";
?>
