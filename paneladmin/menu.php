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
        <li>
            <a href="?p=mahasiswa">
              <i class="fa fa-tasks"></i>
              <span>Data Mahasiswa</span>
              </a>
          </li>
          <?php
          switch ($_SESSION['level']) {
            case 'Admin':
          ?>
          <li>
            <a href="?p=kategori">
              <i class="fa fa-book"></i>
              <span>Data Kursus</span>
              </a>
            </li>
          <li>
            <a href="?p=user">
            <i class="fa fa-cogs"></i>
              <span>Management User
              </span>
              </a>
          </li>
          <li>
            <a href="?p=tentang">
              <i class="fa fa-book"></i>
              <span>Tentang Kami</span>
              </a>
            </li>
            <?php
            break;
              }
            ?>
          


</body>
</html>