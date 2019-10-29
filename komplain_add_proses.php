<?php
include "config/koneksi.php";
$tgl = date('d-M-Y');

$username = $_POST['username'];
$jenisKomplain = $_POST['jenis_komplain'];
$topik = $_POST['topik'];
$deskripsi = $_POST['deskripsi'];
$lokasi_file=$_FILES['file']['tmp_name'];
$nama_file=$_FILES['file']['name'];
$info = pathinfo($nama_file);


if (!is_uploaded_file($lokasi_file)) {
   $ext = null;
   
} else {
	$ext = $info['extension'];
}
if(($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == null)){

	move_uploaded_file($lokasi_file,"file/$nama_file");

$update=mysqli_query($koneksi,"INSERT INTO komplain(jenis_komplain, topik, deskripsi, file_pendukung, tanggal_upload, status, username) VALUES('$jenisKomplain', '$topik', '$deskripsi', '$nama_file', '$tgl', 'request', '$username')");

} else {
	echo "<script>window.alert('Tidak Dapat Mengupload File. Hanya File dengan ekstensi png, jpg dan jpeg yang diizinkan')
    window.location='komplain_add.php'</script>";
}

	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysqli_error($koneksi))."</p>";
		}else{
	 echo "<script>window.alert('Menambah Komplain Berhasil')
    window.location='komplain_add.php'</script>";

}

?>