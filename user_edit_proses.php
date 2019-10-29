<?php

include 'config/koneksi.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$level = $_POST['level'];
$email = $_POST['email'];

$add = mysqli_query($koneksi,"UPDATE tbl_user SET nama='$nama', level='$level' WHERE username='$username'");
        echo "<script>window.alert('User $username berhasil diedit')
            window.location='user.php'</script>";

?>