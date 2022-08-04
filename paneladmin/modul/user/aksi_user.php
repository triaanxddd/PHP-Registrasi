<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
  echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
  echo "<center><a href=../../index.php> Silahkan Login </center>";
} else {
  include "../../../config/koneksi.php";

  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $p = $_GET['p'];
  $act = $_GET['act'];

  if ($act == 'hapus') {
    mysqli_query($con, "Delete from user where id_user ='$_GET[id]'");
    header('location:../../media.php?p=user');
  } else if ($act == 'tambah') {
    //baca lokasi file dan nama file dari form(upload)
    $lokasi_file = $_FILES['file']['tmp_name'];
    $nama_file = $_FILES['file']['name'];

    //tanggal sekarang
    $tgl_upload = date("Ymd");
    $id_user = $_GET['id'];
    $username = $_POST['username'];
    $npm = $_POST['npm'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $blokir = $_POST['blokir'];

    if (!empty($lokasi_file)) {
      move_uploaded_file($lokasi_file, "$folder");
      $sql = mysqli_query($con, "insert into user (id_user, username, password, npm, kelas, email, level, blokir) 
      value ('$id_user', '$username', '$password', '$npm', '$kelas', '$email', '$level', 'N')");
      header('location:../../media.php?p=user');
    } else {
      $sql = mysqli_query($con, "insert into user (id_user, username, password, npm, kelas, email, level, blokir) 
      value ('$id_user', '$username', '$password', '$npm', '$kelas', '$email', '$level', 'N')");
      header('location:../../media.php?p=user');
    }
  } else if ($act == 'update') {
    //baca lokasi file dan nama file dari form(upload)
    $lokasi_file = $_FILES['file']['tmp_name'];
    $nama_file = $_FILES['file']['name'];

    if (!empty($lokasi_file)) {
      move_uploaded_file($lokasi_file, "$folder");
      $sql = mysqli_query($con, "Update user set username ='$_POST[username]', npm ='$_POST[npm]', kelas ='$_POST[kelas]', email ='$_POST[email]', level ='$_POST[level]' where id_user ='$_POST[kode]'");
      header('location:../../media.php?p=user');
    } else {
      $sql = mysqli_query($con, "Update user set username ='$_POST[username]', npm ='$_POST[npm]', kelas ='$_POST[kelas]', email ='$_POST[email]', level ='$_POST[level]' where id_user ='$_POST[kode]'");
      header('location:../../media.php?p=user');
    }
  }
}
