<?php
include 'config/koneksi.php';

$username = $_POST['nim'];
    $password = md5($_POST['password']);


    $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";

    $query = mysqli_query($koneksi,$sql);
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        $row = mysqli_fetch_array($query);
        session_start();
    //     if($row['status'] == 'tidak aktif'){
    //         echo "<script>window.alert('Account anda belum aktif. Silahkan Aktivasi melalui email')
    // window.location='login.php'</script>";
    //     }else{
            $_SESSION['username'] = $row['username'];
        header("location:index.php");
        // }
        
    } else {
        echo "<script>window.alert('Password atau Username anda Salah')
    window.location='login.php'</script>";
        
    }
    exit();
?>