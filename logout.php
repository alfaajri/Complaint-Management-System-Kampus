<?php
session_start();
session_destroy();
echo "<script>window.alert('Terima Kasih, Anda berhasil Logout')
    window.location='login.php'</script>";
?>