<?php
session_start();
include "../../lib/config.php";
include "../../lib/koneksi.php";
?>
<?php 
include "../../template/header.php";
?>
<br><br>
<div class="main-body">
  <div class="row gutters-sm" style="display: contents";">
    <div class="col-md-12 mt-10 center">
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <?php 
                    $id_campaigner = $_SESSION['id_campaigner'];
                    $QueryCampaigner = mysqli_query($koneksi, "SELECT * FROM tbl_campaign WHERE id_campaigner = $id_campaigner");
                    ?>
            <table class="table table-striped">
              <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Dana Target</th>
                <th>Dana Terkumpul</th>
                <th>Sisa Waktu</th>
                <th>Action</th>
              </tr>
              <?php 
                      while ($row = mysqli_fetch_array($QueryCampaigner)) {
                        $tgl1 = new DateTime($row['tanggal_selesai']);
                        $tgl2 = new DateTime();
                        $d = $tgl2->diff($tgl1)->days ;
                      ?>
              <tr>
                <td class="font-weight-600"><?= $row['judul']; ?></td>
                <td class="font-weight-600"><?= $row['deskripsi_campaign']; ?></td>
                <td class="font-weight-600"><img src="../../assets/upload/<?php echo $row['gambar']?>" alt=""></td>
                <td class="font-weight-600">Rp.<?= number_format($row['dana_target']); ?></td>
                <td class="font-weight-600">Rp.<?= number_format($row['dana_terkumpul']); ?></td>
                <td class="font-weight-600">Tersisa <?php echo $d ?> Hari</td>
                <td>
                  <a href="edit_campaign.php?id_campaign=<?= $row['id_campaign']; ?>">
                    <button class="btn btn-warning" style="width:130px;">Edit  <i class="mdi mdi-pencil"></i></button>
                  </a>
                  <a href="../aksi/hapus_campaign.php?id_campaign=<?= $row['id_campaign']; ?>"
                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                    <button class="btn btn-danger" style="width:130px;">  Hapus   <i class="mdi mdi-pencil"></i></button>
                  </a>
                  <a href="form_pencairan_dana.php?id_campaign=<?= $row['id_campaign']; ?>">
                    <button class="btn btn-secondary" style="width:130px;">Cairkan Dana<i class="mdi mdi-pencil"></i></button>
                  </a>
                  <a href="list_donasi_masuk.php?id_campaign=<?= $row['id_campaign']; ?>">
                    <button class="btn btn-primary" style="width:130px;">Donasi Masuk<i class="mdi mdi-pencil"></i></button>
                  </a>
                </td>
                </td>
              </tr>
              <?php }?>
            </table>
            <div class="card-footer">
              <div class="card-footer-action">
                <a href="form_tambah_campaign.php" class="btn btn-danger">Tambah <i></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php 
include "../../template/footer.php";
?>