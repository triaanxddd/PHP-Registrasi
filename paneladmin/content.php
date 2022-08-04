<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Universitas Jewepe</title>

  <!-- Favicons -->
  <link href="img/ny.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>


</head>

<body>

<?php
if($_GET['p']==home){
  include 'home.php';
}else if($_GET['p']==mahasiswa){
  include 'modul/mahasiswa/mahasiswa.php';
}else if($_GET['p']==kategori){
  include 'modul/kategori/kategori.php';
}else if($_GET['p']==user){
  include 'modul/user/user.php';
}else if($_GET['p']==tentang){
  include 'modul/tentang/tentang.php';
}else{
  include '404.html';
}
?>

    </body>
</html>