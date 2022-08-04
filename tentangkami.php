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
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <h1 class="display-4">TENTANG KAMI</h1>
  </section>
  <!-- Akhir Jumbotron -->
  <br>
  <br>
  <!--Hero Section -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <?php
        //include_once "controllers/strconnect.php"; 
        //memanggil fungsi koneksi string, krna trhubung dgn database
        $con = mysqli_connect("localhost", "root", "", "kursus");
        $sql = mysqli_query($con, "Select * from tentang order by visi asc");
        $no = 1;
        while ($r = mysqli_fetch_array($sql)) {
        ?>
          <h3 class="text-center"><span>Visi</span></h3>
          <p class="text-center"><?php echo $r['visi']; ?></p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
      </div>
    <?php } ?>
    </div>
  </section>
  <!-- End Contact Section -->
  <br>
  <!--Hero Section -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <?php
        //include_once "controllers/strconnect.php"; 
        //memanggil fungsi koneksi string, krna trhubung dgn database
        $con = mysqli_connect("localhost", "root", "", "kursus");
        $sql = mysqli_query($con, "Select * from tentang order by misi asc");
        $no = 1;
        while ($r = mysqli_fetch_array($sql)) {
        ?>
          <h3 class="text-center"><span>Misi</span></h3>
          <p class="text-center"><?php echo $r['misi']; ?></p>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
      </div>
    <?php } ?>
    </div>
  </section>
  <!-- End Contact Section -->
  <br>

  <!-- Awal Container  -->
  <div class="container">
    <div class="row kontak text-center">
      <div class="col-lg">
        <h3 class="text-center">Kontak</h3>
        <p><a href="https://bit.ly/3klICow"><i class="bi bi-whatsapp">0812-1068-2410</a></i> | <a href="mailto:patoenksolidarity99@gmail.com?Subject: secondaryrmasi"><i class="bi bi-envelope"> univ.jewepe@gmail.com</a></i> | <a href="https://www.instagram.com/patoenk.solidarity/" class="text-black"><i class="bi bi-instagram"> Universitas Jewepe</a></i></p>
      </div>
    </div>
  </div>
  <!-- Akhir Container -->
  <br>
  <!-- Awal Quotes -->
  <section class="quotes">
    <div class="row justify-content-center bg-secondary text-white text-center pt-2 pb-2">
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