<?php
session_start();
session_destroy();
echo "<script>alert('Anda Keluar Dari Halaman Administrator'); 
window.location=../index.php</script>";
header("Location:../index.php");

?>