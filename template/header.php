
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Charifit</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo $base_url;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/vendor/nouislider/nouislider.min.css">

</head>

<body>
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-lg-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-phone"></i> +1 (454) 556-5656</a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>Yourmail@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-4">
                            <div class="social_media_links d-none d-lg-block">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?php echo $base_url; ?>index.php">home</a></li>
                                        <li><a href="<?php echo $base_url; ?>page/campaigner/tampil.php">Donasi</a></li>
                                        <li><a href="#"> Kategori<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                            <?php
                                                $QueryKategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                                 while ($kategori = mysqli_fetch_array($QueryKategori)) {
                                            ?>
                                             <li>
                                                <a href="<?php echo $base_url; ?>page/campaigner/tampil_kategori.php?id_kategori=<?= $kategori['id_kategori']; ?>"> <?= $kategori['nama_kategori']; ?></a>
                                              </li>
                                           <?php } ?>
                                            </ul>
                                        </li>
                                        <?php if (empty($_SESSION['nama_donatur']) AND empty($_SESSION['nama_campaigner'])) { ?>
                                         <li><a href="#"> User<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo $base_url; ?>login_donatur.php">Login Donatur</a></li>
                                                <li><a href="<?php echo $base_url; ?>login_campaigner.php">Login Campaigner</a></li>
                                                <li><a href="<?php echo $base_url; ?>register_donatur.php">Register Donatur</a></li>
                                                <li><a href="<?php echo $base_url; ?>register_campaigner.php">Register Campaigner</a></li>
                                            </ul>
                                        </li>
                                         <?php } ?>
                                         <?php if (!empty($_SESSION['nama_donatur'])) { ?>
                                            <li><a href="#"> Donatur<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo $base_url; ?>page/donatur/history.php">History</a></li>
                                                <li><a href="<?php echo $base_url; ?>page/donatur/profile.php">Profil</a></li>
                                                <li><a href="<?php echo $base_url; ?>page/aksi/logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                       <?php } ?>
                                       <?php if (!empty($_SESSION['nama_campaigner'])) { ?>
                                            <li><a href="#"> Campaigner<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?php echo $base_url; ?>page/campaigner/form_tambah_campaign.php">Tambah Campaign</a></li>
                                                <li><a href="<?php echo $base_url; ?>page/campaigner/list_campaign.php">Campaign</a></li>
                                                <li><a href="<?php echo $base_url; ?>page/campaigner/profile.php">Profil</a></li>
                                                <li><a href="<?php echo $base_url; ?>page/aksi/logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                       <?php } ?>                                      
                                    </ul>
                                </nav>
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a data-scroll-nav='1' href="#">Make a Difference</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
