<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<center>Untuk mengakses halaman ini anda harus login</center><br>";
    echo "<center><a href=../../index.php> Silahkan Login</center>";
}else{
    $aksi="modul/user/aksi_user.php";
    switch ($_GET["aksi_user"]) {
        default:
?>
        <h3><i class="fa fa-angle-right"></i> Management User</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Data user</h4>
              <div class="col-sm-10" allign='right'>
              <a href=<?php echo "?p=user&aksi_user=tambah"; ?>> <button type="button" class="btn btn-info">Tambah</button> </a>
              </div> <br>
              <section id="unseen">
                <br><br><br>
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>NPM</th>
                      <th>Kelas</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sql=mysqli_query($con, "select * from user order by username asc");
                    $no=1;
                    while($r=mysqli_fetch_array($sql)){
                      echo"<tr><td>$no</td>
                            <td>$r[username]</td>
                            <td>$r[password]</td>
                            <td>$r[npm]</td>
                            <td>$r[kelas]</td>
                            <td>$r[email]</td>
                            <td>$r[level]</td>
                            <td>
                            <a href=?p=user&aksi_user=edit&id=$r[id_user]><button type='button' class='btn btn-info'>Edit</button></a>
                            <a href='$aksi?act=hapus&id=$r[id_user]'<button type='button' class='btn btn-danger'>Delete</button>
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

        <h3><i class="fa fa-angle-right"></i> Management User</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah User</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/user/aksi_user.php?act=tambah";?> enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="password">
                  </div>
                </div>
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
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email">
                  </div>
                </div>
                <div class="form-group">
                    <label for="level" class="col-sm-2 col-sm-2 control-label">Level</label>
                    <div class="col-sm-10">
                        <select name="level" id="level" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Pengguna">Pengguna</option>
                        </select>
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

      $sql = mysqli_query($con, "Select * from  user where id_user='$_GET[id]'");
      $r = mysqli_fetch_array($sql);
?>
<h3><i class="fa fa-angle-right"></i> Management User</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit User</h4>
              <form class="form-horizontal style-form" method="POST" action=<?php echo"modul/user/aksi_user.php?act=update";?> enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="kode" value=<?php echo "$r[id_user]"; ?>>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="<?php echo $r[username]; ?> ">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">NPM</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="npm" value="<?php echo $r[npm]; ?> ">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kelas" value="<?php echo $r[kelas]; ?> ">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $r[email]; ?> ">
                </div>
                </div>
                <div class="form-group">
                    <label for="level" class="col-sm-2 col-sm-2 control-label">Level</label>
                    <div class="col-sm-10">
                        <select name="level" id="level" class="form-control" value="<?php echo $r['level'];  ?>">
                            <option value="Admin">Admin</option>
                            <option value="Pengguna">Pengguna</option>
                        </select>
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