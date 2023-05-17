

    <!-- Register Section Begin -->
    <br><br><br><br>
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login Donatur</h2>
                        <form id="loginform" action="page/aksi/login_donatur_action.php" method="POST">
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="text" class="form-control" name="username" placeholder="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <br>
                            </div>
                            <button type="submit"  class="book_btn d-none d-lg-block">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="<?php echo $base_url; ?>register_donatur.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <!-- Register Form Section End -->
    
