<?php 
include 'config/koneksi.php';
$passLama = md5($_POST['password_lama']);
$passBaru = md5($_POST['password_baru']);
$passUlangi = md5($_POST['ulangi_password_baru']);
$username = $_POST['username'];

$query_cari = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'");
$hasil_query = mysqli_fetch_array($query_cari);

if($passLama <> $hasil_query['password']){
    echo "<script>window.alert('Password Lama yang Anda Masukkan Salah')
            window.location='profil.php'</script>";
} 
else if($passBaru <> $passUlangi){
    echo "<script>window.alert('Password Baru dan Konfirmasi Password Tidak Sama')
            window.location='profil.php'</script>";
} else {
	$add = mysqli_query($koneksi,"UPDATE tbl_user SET password='$passBaru' WHERE username='$username'");
        echo "<script>window.alert('User $username berhasil diubah passwordnya')
            window.location='profil.php'</script>";
}

?>