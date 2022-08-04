<?php
include "../config/koneksi.php";

// Mencagah Terjadinya SQL Injection
function anti_injection($data){
    $filter=mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
    return $filter;
}

$username=$_POST['username'];
$password=MD5($_POST['password']);

//Pastikan Username dan Password

$login=mysqli_query($con, "Select * From user where username='$username' AND password='$password'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila Username dan Password Ketemu
if($ketemu >0){
    session_start();

    $_SESSION["id_user"] = $r["id_user"];
    $_SESSION["username"] = $r["username"];
    $_SESSION["password"] = $r["password"];
    $_SESSION['nama_lengkap'] = $r['nama_lengkap'];
    $_SESSION['email'] = $r['email'];
    $_SESSION['level'] = $r['level'];

    $id_lama = session_id();
    session_regenerate_id();
    $id_baru = session_id();

    echo"<script>alert('Selamat Datang $_SESSION[username]'); 
    windows.location=media.php</script>";
    header('location:media.php?p=home'); 
}else{
    echo"<script>alert('Login Gagal Username dan Password Salah'); 
    windows.location=media.php</script>";
    header('location:index.php'); 
}

?>