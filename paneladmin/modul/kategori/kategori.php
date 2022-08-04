<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
    echo "<center><a href=../../index.php> Silahkan Login</center>";
}else{
    $aksi="modul/kategori/aksi_kategori.php";
    switch ($_GET["aksi_kategori"]) {
        default:
?>
        <h3><i class="fa fa-angle-right"></i>Data Kursus</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Form Kursus</h4>
              <div class="col-sm-10" allign='right'>
              <a href=<?php echo "?p=kategori&aksi_kategori=tambah"; ?>> <button type="button" class="btn btn-info">Tambah</button> </a>
              </div> <br>
              <section id="unseen">
                <br><br><br>
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode kategori</th>
                      <th>Kursus</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql=mysqli_query($con, "select * from kategori order by nama_kategori asc");
                    $no=1;
                    while($r=mysqli_fetch_array($sql)){
                      echo"<tr><td>$no</td>
                            <td>$r[id_kategori]</td>
                            <td>$r[nama_kategori]</td>
                            <td>
                            <a href=?p=kategori&aksi_kategori=edit&id=$r[id_kategori]><button type='button' class='btn btn-info'>Edit</button></a>
                            <a href='$aksi?act=hapus&id=$r[id_kategori]'<button type='button' class='btn btn-danger'>Delete</button>
                            </td>";
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

        <h3><i class="fa fa-angle-right"></i>Data Kursus</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Kursus</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/kategori/aksi_kategori.php?act=tambah";?> enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kursus</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_kategori">
                  </div>
                </div>
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

      $sql = mysqli_query($con, "Select * from  kategori where id_kategori='$_GET[id]'");
      $r = mysqli_fetch_array($sql);
?>
<h3><i class="fa fa-angle-right"></i>Data Kursus</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Kursus</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/kategori/aksi_kategori.php?act=update";?> enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="kode" value=<?php echo "$r[id_kategori]"; ?>>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kursus</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $r[nama_kategori]; ?> ">
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