<?php
include "../../header.php";
?>
<!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Campaigner</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali ke Daftar Campaigner <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                      <div class="card-body">
                    <form action="aksi_simpan.php" method="POST">
                    <div class="form-group" >
                      <label>Username</label>
                      <input type="text" class="form-control" id="userName" name="userName">
                      <label>Nama Campaigner</label>
                      <input type="text" class="form-control" id="nama_campaigner" name="nama_campaigner">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      <label>Email</label>
                      <input type="email" class="form-control" id="email" name="email">
                      <label>No Handphone</label>
                      <input type="text" class="form-control" id="no_telpon" name="no_telpon">
                    </div>
  
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
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