<?php
include 'config/koneksi.php';
    $username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$level = $_POST['level'];
$email = $_POST['email'];

$mdpass = md5($_POST['password']);


    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'"));
if($cek > 0){
    echo "<script>window.alert('Username yang anda masukan sudah ada')
    window.location='user_add.php'</script>";
    }else{
$insert=mysqli_query($koneksi,"INSERT INTO tbl_user(username,password,nama,level,email) VALUES ('$username','$mdpass','$nama','$level','$email')");
    //mail($to,$subject,$message, $headers);
    }
if ($insert == FALSE){
        echo "<p>Inser Gagal karena: ada data ganda</p>";
        }else{
        echo "<script>window.alert('Menambah User Berhasil')
    window.location='user.php'</script>";
}

?>