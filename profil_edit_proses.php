<?php

include 'config/koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$lokasi_file=$_FILES['file']['tmp_name'];
$nama_file=$_FILES['file']['name'];
$info = pathinfo($nama_file);


if (!is_uploaded_file($lokasi_file)) {
   $ext = null;
   
} else {
	$ext = $info['extension'];
}
if(($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == null)){

	move_uploaded_file($lokasi_file,"foto/$nama_file");

$update=mysqli_query($koneksi,"UPDATE tbl_user SET email='$email', foto='$nama_file' WHERE username='$username'");

} else {
	echo "<script>window.alert('Tidak Dapat Mengupload File. Hanya File dengan ekstensi png, jpg dan jpeg yang diizinkan')
    window.location='profil.php'</script>";
}

	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	 echo "<script>window.alert('Update Profil Berhasil')
    window.location='profil.php'</script>";

}

?>