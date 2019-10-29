<?php
include 'config/koneksi.php';
$id = addslashes(trim($_GET['id']));

$delete = mysqli_query($koneksi,"DELETE FROM komplain WHERE id=$id");

header('location: komplain.php');
?>