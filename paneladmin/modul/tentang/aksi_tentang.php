<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
    echo "<center><a href=../../index.php> Silahkan Login</center>";
}else{
    include "../../../config/koneksi.php";

    $p=$_GET['p'];
    $act=$_GET['act'];

    if ($act=='hapus'){

        mysqli_query($con, "Delete from tentang where id_tentang='$_GET[id]'");
        header('location:../../media.php?p=tentang');
    
    }else if($act == 'tambah'){
            $sql = mysqli_query($con, "insert into tentang (visi, misi) values ('$_POST[visi]', '$_POST[misi]')");
            header('location:../../media.php?p=tentang');
         

    }else if($act == 'update'){
      $sql = mysqli_query($con, "Update tentang set visi ='$_POST[visi]', misi ='$_POST[misi]' where id_tentang ='$_POST[kode]'");
            header('location:../../media.php?p=tentang');
        

    }

}
?>
