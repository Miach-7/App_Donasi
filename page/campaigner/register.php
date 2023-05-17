
<br><br><br>
<section id="form" style="margin-top: 1rem;">
    <div class="container">
        <div class="row">
        <div class="col-lg-6 offset-lg-3">
                <div class="signup-form">
                    <?php echo isset($message['register']) ? $message['register'] : ''; ?>
                    <h2>New Campaigner Signup!</h2>
                    <form action="<?= $base_url ?>page/aksi/register_campaigner_action.php" method="POST">
                    <label>Username</label>
                      <input type="text" class="form-control" id="userName" name="userName">
                      <label>Nama Campaigner</label>
                      <input type="text" class="form-control" id="nama_campaigner" name="nama_campaigner">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      <label>Email</label>
                      <input type="email" class="form-control" id="email" name="email">
                      <label>No Telpon</label>
                      <input type="text" class="form-control" id="no_telpon" name="no_telpon">
                      <br>                    
                        <button type="submit" class="btn btn-default mt-2">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
