<?php
//function start lagi
session_start();


//session terdaftar, saatnya logout
session_unset();
session_destroy();
header('location:../../index.php');

?>