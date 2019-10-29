<?php
include 'config/koneksi.php';
$id = addslashes(trim($_GET['id']));

$delete = mysqli_query($koneksi,"DELETE FROM tbl_user WHERE username='$id'");

header('location: user.php');
?>