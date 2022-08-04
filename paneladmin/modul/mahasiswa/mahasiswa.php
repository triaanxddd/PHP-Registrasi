<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
    echo "<center><a href=../../index.php> Silahkan Login</center>";
}else{
    $aksi="modul/mahasiswa/aksi_mahasiswa.php";
    switch ($_GET["aksi_mahasiswa"]) {
        default:
?>
        <h3><i class="fa fa-angle-right"></i> Data Mahasiswa</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Data Mahasiswa</h4>
              <div class="col-sm-10" allign='right'>
              <a href=<?php echo "?p=mahasiswa&aksi_mahasiswa=tambah"; ?>> <button type="button" class="btn btn-info">Tambah</button> </a>
              </div> <br>
              <section id="unseen">
                <br><br><br>
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
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  switch ($_SESSION['level']) {
                    case 'Admin':
                        $where = '';
                        break;

                    case 'Pengguna':
                        $where = 'where created_by = ' . $_SESSION['id_user'];
                        break;
                }
                $sql = mysqli_query($con, "Select * from mahasiswa " . $where . " order by username asc");
                    $no=1;
                    while($r=mysqli_fetch_array($sql)){
                      $tanggalindonesia=tgl_indo($r[tanggal_masuk]);
                      echo"<tr><td>$no</td>
                            <td>$r[npm]</td>
                            <td>$r[kelas]</td>
                            <td>$r[username]</td>";

                            $sql2=mysqli_query($con, "select * from kategori where id_kategori=$r[id_kategori]");
                            $r2=mysqli_fetch_array($sql2);

                      echo" <td>$r2[nama_kategori]</td> 
                            <td>$r[deskripsi]</td>
                            <td>$tanggalindonesia</td>
                            <td>
                            <a href=?p=mahasiswa&aksi_mahasiswa=edit&id=$r[kd_mahasiswa]><button type='button' class='btn btn-info'>Edit</button></a>
                            <a href='$aksi?act=hapus&id=$r[kd_mahasiswa]'<button type='button' class='btn btn-danger'>Delete</button>";
                      $no++;
                    }

                  ?>
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>

<?php
    break;
    case 'tambah':
?>

        <h3><i class="fa fa-angle-right"></i> Master Mahasiswa</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Mahasiswa</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/mahasiswa/aksi_mahasiswa.php?act=tambah";?> enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">NPM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="npm">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kelas">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kursus</label>
                  <div class="col-sm-10">
                    <select name="kategori" class="form-control">
                    <?php
                    $sql=mysqli_query($con,"Select * From kategori order by nama_kategori");
                    while($r2=mysqli_fetch_array($sql)){
                        echo"<option value=$r2[id_kategori]>$r2[nama_kategori]</option>";

                    }

                    ?>
                    </select>
                  </div>
                </div>
                <?php
                switch ($_SESSION['level']) {
                case 'Admin':
                ?>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="tanggal_masuk" value="2022-01-01" size="16" class="form-control">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                <?php
                break;
                }
                ?>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
<?php
    break;
    case 'edit':

      $sql = mysqli_query($con, "Select * from  mahasiswa where kd_mahasiswa='$_GET[id]'");
      $r = mysqli_fetch_array($sql);
?>
<h3><i class="fa fa-angle-right"></i> Data Mahasiswa</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Mahasiswa</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/mahasiswa/aksi_mahasiswa.php?act=update";?> enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="kode" value=<?php echo "$r[kd_mahasiswa]"; ?>>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">NPM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="npm" value=<?php echo "$r[npm]"; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kelas" value=<?php echo "$r[kelas]"; ?>>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value=<?php echo "$r[username]"; ?>>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kursus</label>
                  <div class="col-sm-10">
                    <select name="kategori" class="form-control">
                    <?php
                    $tampil=mysqli_query($con, "Select * From kategori order by nama_kategori");
                      if ($r[id_kategori]==0){
                        echo "<option value=0 selected>- Pilih Kategori -</option>";
                      }

                      while($w=mysqli_fetch_array($tampil)){
                        if ($r[id_kategori]==$w[id_kategori]){
                          echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
                        }
                        else{
                          echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi"><?php echo "$r[deskripsi]"; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Masuk</label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="tanggal_masuk" value=<?php echo "$r[tanggal_masuk]"; ?> size="16" class="form-control">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
<?php
    break;
    }//Tutup dari switch
}//Tutup dari if
?>