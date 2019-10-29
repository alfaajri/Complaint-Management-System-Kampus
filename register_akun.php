<?php
include 'config/koneksi.php';

$nimS = $_POST['nim'];
$emailS = $_POST['email'];
$passwordS = md5($_POST['password']);

$cariMhs = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa WHERE nim = '$nimS'");
$hasilMhs = mysqli_num_rows($cariMhs);
$hasilMhs2 = mysqli_fetch_array($cariMhs);

$namaS = $hasilMhs2['nama'];

if($hasilMhs > 0){
	$cariUser = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username = '$nimS'");
	$hasilUser = mysqli_num_rows($cariUser);

	if($hasilUser == 0){
		$insertUser = mysqli_query($koneksi,"INSERT INTO tbl_user(username, nama, email, password, level) VALUES ('$nimS', '$namaS', '$emailS', '$passwordS', 'mahasiswa')");

		if ($insertUser == FALSE){
        echo "<p>Inser Gagal karena: ada data ganda</p>";
		        }else{
		        echo "<script>window.alert('Selamat Datang $namaS ! Anda adalah User Pada Complain Management System, Silahkan Login')
		    window.location='login.php'</script>";
		}
	} else {
		echo "<script>window.alert('NIM $nimS sudah terdaftar sebagai User di Complain Management System')
    	window.location='login.php'</script>";
	}
} else {
	echo "<script>window.alert('NIM $nimS bukan Mahasiswa Fakultas Sains dan Teknologi UIN Suska Riau')
    window.location='login.php'</script>";
}

?>