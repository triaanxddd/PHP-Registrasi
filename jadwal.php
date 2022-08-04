<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link href="paneladmin/img/ny.jpg" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css?fa,ily=Biga" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="style1.css">

    <title>Universitas Jewepe</title>
  </head>
  <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
        <div class="container">
            <a class="navbar-brand" href="index.php">Universitas Jewepe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="jadwal.php">Jadwal</a>
                <a class="nav-link" href="tentangkami.php">Tentang</a>
                <a class="nav-link" href="paneladmin/index.php">Login</a>
            </div>
            </div>
        </div>
      </nav>
      <!-- Akhir Navbar -->

  <!-- Awal Jumbotron -->
  <section class="jumbotron-bg bg-dark text-white text-center">
    <h1 class="display-4">JADWAL</h1>
  </section>
  <!-- Akhir Jumbotron -->
  <br>
  <!-- Awal Container  -->
  <div class="container">
    <div class="content-panel">
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Nama</th>
            <th>Kursus</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $con = mysqli_connect("localhost", "root", "", "kursus");
            $sql = mysqli_query($con, "Select * from mahasiswa order by username asc");
            $no = 1;

            while ($r = mysqli_fetch_array($sql)) {
              echo "<tr><td>$no</td>
                    <td>$r[npm]</td>
                    <td>$r[kelas]</td>
                    <td>$r[username]</td>";
                    
                    $sql2=mysqli_query($con, "select * from kategori where id_kategori=$r[id_kategori]");
                    $r2=mysqli_fetch_array($sql2);
                    
              echo" <td>$r[id_kategori]</td>
                    <td>$r[deskripsi]</td>
                    <td>$r[tanggal_masuk]</td>
                    ";

              $no++;
            }

            ?>

          </tbody>
        </table>
      </section>
    </div>
    <br>
    <div class="row jadwal">
          <div class="col-lg">
            <img src="paneladmin/img/pentul.png" width="400" alt="tentangkami" class="img-fluid">
          </div>
          <div class="col-lg">
            <h3>CATATAN!</h3>
            <br>
            <p>Kode kategori 1 Kursus FUNDAMENTAL DESKTOP<br>
            Kode kategori 2 Kursus FUNDAMENTAL DBMS<br>
            Kode kategori 3 Kursus VB.NET FOR INTERMEDIATE<br>
            Kode kategori 4 Kursus 	SQL SERVER FOR INTERMEDIATE<br></p>
          </div>
        </div>
  </div>
  <!-- Akhir Container -->
  <br>
  <!-- Awal Quotes -->
  <section class="quotes">
    <div class="row justify-content-center bg-dark text-white text-center pt-2 pb-2">
      <div class="col-lg-8">
        <h4>Terima Kasih Telah Mengunjungi Situs Website Kami</h4>
      </div>
    </div>
  </section>
  <!-- AKhir Quotes -->

  <!-- Awal Footer -->
  <footer class="bg-secondary text-white text-center">
    <p>Copyright @2022 Universitas Jewepe created by <a href="https://www.instagram.com/yayungsf/" class="text-white">Syahrul Fahrurrozi</a></p>
  </footer>
  <!-- Akhir Footer -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>