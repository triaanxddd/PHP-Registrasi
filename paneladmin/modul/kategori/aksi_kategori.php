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

        mysqli_query($con, "Delete from kategori where id_kategori='$_GET[id]'");
        header('location:../../media.php?p=kategori');
    
    }else if($act == 'tambah'){
            $sql = mysqli_query($con, "insert into kategori (nama_kategori) values ('$_POST[nama_kategori]')");
            header('location:../../media.php?p=kategori');
         

    }else if($act == 'update'){
      $sql = mysqli_query($con, "Update kategori set nama_kategori ='$_POST[nama_kategori]' where id_kategori ='$_POST[kode]'");
            header('location:../../media.php?p=kategori');
        

    }

}
?>
