<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
    echo "<center><a href=../../index.php> Silahkan Login</center>";
}else{
    include "../../../config/koneksi.php";
    include "../../../config/kompres.php";

    $p=$_GET['p'];
    $act=$_GET['act'];

    if ($act=='hapus'){

        mysqli_query($con, "Delete from mahasiswa where kd_mahasiswa='$_GET[id]'");
        header('location:../../media.php?p=mahasiswa');
    
    }else if($act == 'tambah'){
        //baca lokasi file dan nama file dari form(upload)
        $lokasi_file = $_FILES['file']['tmp_name'];
        $nama_file = $_FILES['file']['name'];
        $acak = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

        //tanggal sekarang
        $tgl_upload = date("Ymd");

        if (!empty($lokasi_file)) {
            UpoloadImage($nama_file_unik);
            $sql = mysqli_query($con, "insert into mahasiswa (npm, kelas, username, id_kategori, deskripsi, tanggal_masuk, created_by) 
            values ('$_POST[npm]','$_POST[kelas]','$_POST[username]','$_POST[kategori]','$_POST[deskripsi]','$_POST[tanggal_masuk]', " . $_SESSION['id_user'] . ")");
            header('location:../../media.php?p=mahasiswa');
        } else {
            $sql = mysqli_query($con, "insert into mahasiswa (npm, kelas, username, id_kategori, deskripsi, tanggal_masuk, created_by) 
            values ('$_POST[npm]','$_POST[kelas]','$_POST[username]','$_POST[kategori]','$_POST[deskripsi]','$_POST[tanggal_masuk]', " . $_SESSION['id_user'] . ")");
            header('location:../../media.php?p=mahasiswa');

    
        }

    }else if($act == 'update'){
        //baca lokasi file dan nama file dari form(upload)
        $lokasi_file = $_FILES['file']['tmp_name'];
        $nama_file = $_FILES['file']['name'];
        $acak = rand(1,99);
        $nama_file_unik = $acak.$nama_file;

        //tanggal sekarang
        $tgl_upload = date("Ymd");

        //Apabila gambar tidak diganti
        if (!empty($lokasi_file)) {
            UpoloadImage($nama_file_unik);
            $sql = mysqli_query($con, "Update mahasiswa set npm ='$_POST[npm]', kelas ='$_POST[kelas]', username ='$_POST[username]', id_kategori ='$_POST[kategori]', deskripsi ='$_POST[deskripsi]', tanggal_masuk ='$_POST[tanggal_masuk]' where kd_mahasiswa ='$_POST[kode]'");
            header('location:../../media.php?p=mahasiswa');
        } else {
            $sql = mysqli_query($con, "Update mahasiswa set npm ='$_POST[npm]', kelas ='$_POST[kelas]', username ='$_POST[username]', id_kategori ='$_POST[kategori]', deskripsi ='$_POST[deskripsi]', tanggal_masuk ='$_POST[tanggal_masuk]' where kd_mahasiswa ='$_POST[kode]'");
            header('location:../../media.php?p=mahasiswa');

    
        }

    }

}
?>
