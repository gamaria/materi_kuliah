<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Jenis Kendaraan </h3>
                  <?php if($_SESSION[level]='kepala'){ ?>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=jenis_kendaraan&act=tambah'>Tambahkan Data</a>
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Merek</th>
                        <th>Keterangan</th>
                        <?php if($_SESSION[level]='kepala'){ ?>
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM tb_jkendaraan ORDER BY id_jkendaraan DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[merek]</td>
                              <td>$r[ket]</td>";
                              if($_SESSION[level]='kepala'){
                        echo "<td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=jenis_kendaraan&act=edit&id=$r[id_jkendaraan]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=jenis_kendaraan&hapus=$r[id_jkendaraan]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }

                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM tb_jkendaraan where id_jkendaraan='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=jenis_kendaraan';</script>";
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
        mysql_query("UPDATE tb_jkendaraan SET merek = '$_POST[a]',
                                         ket = '$_POST[b]' where id_jkendaraan='$_POST[id]'");
      echo "<script>document.location='index.php?view=jenis_kendaraan';</script>";
    }
    $edit = mysql_query("SELECT * FROM tb_jkendaraan where id_jkendaraan='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Jenis Kendaraan</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_jkendaraan]'>
                    <tr><th width='120px' scope='row'>Merek</th> <td><input type='text' class='form-control' name='a' value='$s[merek]'> </td></tr>
                    <tr><th width='120px' scope='row'>Keterangan</th> <td><input type='text' class='form-control' name='b' value='$s[ket]'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=jenis_kendaraan'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysql_query("INSERT INTO tb_jkendaraan VALUES('','$_POST[a]','$_POST[b]')");
        echo "<script>document.location='index.php?view=jenis_kendaraan';</script>";
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Jenis Kendaraan</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Merek</th> <td><input type='text' class='form-control' name='a'> </td></tr>
                    <tr><th width='120px' scope='row'>Keterangan</th> <td><input type='text' class='form-control' name='b'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=jenis_kelompok'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>