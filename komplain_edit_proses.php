<?php
include 'config/koneksi.php';

$tgl = date('d-M-Y');
$id = $_POST['id'];
$jenis = $_POST['jenis_komplain'];
$topik = $_POST['topik'];
$deskripsi = $_POST['deskripsi'];

$lokasi_file=$_FILES['file']['tmp_name'];
$nama_file=$_FILES['file']['name'];
$info = pathinfo($nama_file);

$rowQ = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM komplain WHERE id=$id"));


if (!is_uploaded_file($lokasi_file)) {
   $ext = null;
   $nama_file = $rowQ['file_pendukung'];
} else {
	$ext = $info['extension'];
}
if(($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == null)){

	move_uploaded_file($lokasi_file,"file/$nama_file");

$update=mysqli_query($koneksi,"UPDATE komplain SET jenis_komplain='$jenis', topik='$topik', deskripsi='$deskripsi', file_pendukung='$nama_file', tanggal_upload='$tgl', status='request' WHERE id=$id");

} else {
	echo "<script>window.alert('Tidak Dapat Mengupload File. Hanya File dengan ekstensi png, jpg dan jpeg yang diizinkan')
    window.location='komplain.php'</script>";
}

	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysql_error())."</p>";
		}else{
	 echo "<script>window.alert('Mengedit Komplain Berhasil')
    window.location='komplain.php'</script>";

}

?>