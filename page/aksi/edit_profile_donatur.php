<?php
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idDonatur = $_POST['id_donatur'];
    $userName = $_POST['username'];
    $nama_donatur = $_POST['nama_donatur'];
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
    $QueryEdit = mysqli_query($koneksi, "UPDATE tbl_donatur SET username = '$userName', password ='$password', nama_donatur = '$nama_donatur',  email = '$email', no_telpon ='$no_telpon'  WHERE id_donatur = '$idDonatur'");
    if ($QueryEdit) {
            echo "
            <script>
                alert('Data berhasil disimpan');
                window.location = '$base_url'+'page/donatur/profile.php';;
            </script>";
        } else {
            echo "
            <script> 
                alert('Data gagal disimpan');
                window.location = '$base_url'+'page/donatur/edit_profile.php';
            </script>";
        }
}

?>
