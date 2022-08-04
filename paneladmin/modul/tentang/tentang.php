<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
    echo "<center><a href=../../index.php> Silahkan Login</center>";
}else{
    $aksi="modul/tentang/aksi_tentang.php";
    switch ($_GET["aksi_tentang"]) {
        default:
?>
        <h3><i class="fa fa-angle-right"></i> Tentang Kami</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Form Tentang Kami</h4>
              <div class="col-sm-10" allign='right'>
              <a href=<?php echo "?p=tentang&aksi_tentang=tambah"; ?>> <button type="button" class="btn btn-info">Tambah</button> </a>
              </div> <br>
              <section id="unseen">
                <br><br><br>
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Visi</th>
                      <th>Misi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql=mysqli_query($con, "select * from tentang order by visi asc");
                    $no=1;
                    while($r=mysqli_fetch_array($sql)){
                      echo"<tr><td>$no</td>
                            <td>$r[visi]</td>
                            <td>$r[misi]</td>
                            <td>
                            <a href=?p=tentang&aksi_tentang=edit&id=$r[id_tentang]><button type='button' class='btn btn-info'>Edit</button></a>
                            <a href='$aksi?act=hapus&id=$r[id_tentang]'<button type='button' class='btn btn-danger'>Delete</button>
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

        <h3><i class="fa fa-angle-right"></i> Tentang Kami</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Tambah</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/tentang/aksi_tentang.php?act=tambah";?> enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Visi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="visi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Misi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="misi">
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

      $sql = mysqli_query($con, "Select * from  tentang where id_tentang='$_GET[id]'");
      $r = mysqli_fetch_array($sql);
?>
<h3><i class="fa fa-angle-right"></i> Tentang Kami</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Edit</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/tentang/aksi_tentang.php?act=update";?> enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="kode" value=<?php echo "$r[id_tentang]"; ?>>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Visi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="visi" value="<?php echo $r[visi]; ?> ">
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Misi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="misi" value="<?php echo $r[misi]; ?> ">
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