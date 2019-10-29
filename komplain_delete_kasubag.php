<?php
include 'config/koneksi.php';
$id = addslashes(trim($_GET['id']));

//Select Data Komplain
$select_query = mysqli_query($koneksi,"SELECT * FROM komplain WHERE id=$id");
$select_row = mysqli_fetch_array($select_query);

//Select User Komplain
$username = $select_row['username'];
$user_query = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'");
$user_row = mysqli_fetch_array($user_query);
$email = $user_row['email'];

//kirim email
ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );    
$from = "cms@uin.ac.id";    
$to = $email;    
$subject = "[DITOLAK] Komplain";    
$message = "Mohon maaf, komplain anda dengan Topik : ".$select_row['topik']." dan Deskripsi : ".$select_row['deskripsi']." tidak dapat kami proses. Dikarenakan mengandung kata-kata atau content yang tidak baik. Terimakasih";   
$headers = "From:" . $from;    
mail($to,$subject,$message, $headers);  

//delete
$delete = mysqli_query($koneksi,"DELETE FROM komplain WHERE id=$id");

 echo "<script>window.alert('Menghapus Komplain dan Mengirim Notifikasi Berhasil')
    window.location='komplain.php'</script>";
?>