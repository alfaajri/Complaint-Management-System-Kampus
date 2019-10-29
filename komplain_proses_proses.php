<?php
include 'config/koneksi.php';

$tgl = date('d-M-Y');
$id = $_POST['id'];
$status = $_POST['status_komplain'];
$tanggapan = $_POST['tanggapan'];
$level = $_POST['level'];
$pic = $_POST['username'];

if($level == 'kasubag'){
$update=mysqli_query($koneksi,"UPDATE komplain SET status='$status', tanggal_proses='$tgl', tanggapan='$tanggapan' WHERE id=$id");
} else {
$update=mysqli_query($koneksi,"UPDATE komplain SET status='$status', tanggal_selesai='$tgl', tanggapan='$tanggapan', pic_selesai='$pic' WHERE id=$id");
}



	
	if ($update == FALSE){
		echo "<p>Update Gagal karena:".(mysqli_error())."</p>";
		}else{
	 echo "<script>window.alert('Melakukan Proses Komplain Berhasil')
    window.location='komplain.php'</script>";

}

?>