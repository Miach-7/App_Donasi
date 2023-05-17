<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idCampaigner = $_POST['id_campaigner'];
    $userName = $_POST['username'];
    $nama_campaigner = $_POST['nama_campaigner'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $no_telpon = $_POST['no_telpon'];

    $userName = $_POST['username'];
    if($userName=="")
    {
        echo "
        <script>
            alert('Data kategori harus diisi');
            window.location = 'form_edit.php';
        </script>";
    }
    else
    {
    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_campaigner SET username = '$userName', password ='$password', nama_campaigner = '$nama_campaigner',  email = '$email', no_telpon ='$no_telpon'  WHERE id_campaigner= '$idCampaigner'");
    if ($QueryEdit) {
            echo "
            <script>
                alert('Data berhasil disimpan');
                window.location = 'main.php';
            </script>";
        } else {
            echo "
            <script> 
                alert('Data gagal disimpan');
                window.location = 'main.php';
            </script>";
        }
}

?>
