<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kendaraan Keluar </h3>
                  <?php if($_SESSION[level]='kepala'){ ?>
                  <a class='pull-right btn btn-danger btn-sm' target='_BLANK' href='print-data-keluar.php'>Print Data Kendaraan Keluar</a>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=kendaraan_keluar&act=tambah'>Tambahkan Data</a>
                  
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Tgl Keluar</th>
                        <th>No R.Keluar</th>
                        <th>Kendaraan (No.Reg.Masuk)</th>
                       
                        <th>Selesmen</th>
                        <th>Pembeli</th>
                        <th>Status</th>
                        <?php if($_SESSION[level]='kepala'){ ?>
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM tb_kendaraan_keluar ORDER BY id_keluar DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                            
                              <td><a href='?view=kendaraan_keluar&act=detail&id=$r[id_keluar]'>$r[tgl_keluar]</a></td>
                              <td>$r[no_regis_keluar]</td>
                              <td>$r[kendaraan]</td>
                              
                              <td>$r[nm_seles]</td>
                              <td>$r[nm_pelangan]</td>
                              <td>$r[status_keluar]</td>";
                              if($_SESSION[level]='kepala'){
                        echo "<td><center>
                        
                                
                                
                               
                                <a class='btn btn-success btn-xs' target='_BLANK' title='Print detail kendaraan keluar' href='print-detail-keluar.php?id=$r[id_keluar]'><span class='glyphicon glyphicon-print'></span> 1</a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=kendaraan_keluar&act=edit&id=$r[id_keluar]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=kendaraan_keluar&hapus=$r[id_keluar]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      
                      }

                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM tb_kendaraan_keluar where id_keluar='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=kendaraan_keluar';</script>";
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
        mysql_query("UPDATE tb_kendaraan_keluar SET tgl_keluar = '$_POST[a]',
                                         no_regis_keluar = '$_POST[b]',
                                         kendaraan = '$_POST[c]',
                                         dg_sementara = '$_POST[d]',
                                         nm_seles = '$_POST[e]',
                                         nm_pelangan = '$_POST[f]',
                                         no_ktp = '$_POST[g]',
                                         alamat = '$_POST[h]',
                                         tlp = '$_POST[i]',
                                         status_keluar = '$_POST[j]',
                                         ket_k = '$_POST[k]' where id_keluar='$_POST[id]'");
      echo "<script>document.location='index.php?view=kendaraan_keluar';</script>";
    }
    $edit = mysql_query("SELECT * FROM tb_kendaraan_keluar where id_keluar='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Kendaraan Keluar</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_keluar]'>
                    <tr><th width='120px' scope='row'>Tgl Keluar</th> <td><input type='text' class='form-control' name='a' value='$s[tgl_keluar]'> </td></tr>
                    <tr><th width='120px' scope='row'>No.Registrasi Keluar</th> <td><input type='text' class='form-control' name='b' value='$s[no_regis_keluar]'> </td></tr> 
                    <tr><th scope='row'>Kendaraan (No.Reg.Masuk)</th> <td><select class='form-control' name='c'> 
                             <option value='0' selected>- Pilih Jenis Kendaraan -</option>"; 
                              $kendaraan_masuk = mysql_query("SELECT * FROM tb_kendaraan_masuk");
                                  while($a = mysql_fetch_array($kendaraan_masuk)){
                                    if ($s[kendaraan]==$a[no_regis]){
                                       echo "<option value='$a[no_regis]' selected>$a[no_regis]</option>";
                                    }else{
                                       echo "<option value='$a[no_regis]'>$a[no_regis]</option>";
                                    }
                                  }
                             echo "</select>
                    </td></tr>

                    
                    <tr><th width='120px' scope='row'>DG Sementara</th> <td><input type='text' class='form-control' name='d' value='$s[dg_sementara]'> </td></tr>
                    <tr><th width='120px' scope='row'>selesemen</th> <td><input type='text' class='form-control' name='e' value='$s[nm_seles]'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama Pelangan</th> <td><input type='text' class='form-control' name='f' value='$s[nm_pelangan]'> </td></tr>
                    <tr><th width='120px' scope='row'>No.KTP</th> <td><input type='text' class='form-control' name='g' value='$s[no_ktp]'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat</th> <td><input type='text' class='form-control' name='h' value='$s[alamat]'> </td></tr>
                    <tr><th width='120px' scope='row'>TLP</th> <td><input type='text' class='form-control' name='i' value='$s[tlp]'> </td></tr>
                    
                    
                    <tr><th scope='row'>Status</th> <td><select class='form-control' name='j'> 
                             <option value='0' selected>- Pilih Status -</option>"; 
                              $status_keluar = mysql_query("SELECT * FROM tb_status");
                                  while($a = mysql_fetch_array($status_keluar)){
                                    if ($s[status_keluar]==$a[status]){
                                       echo "<option value='$a[status]' selected>$a[status]</option>";
                                    }else{
                                       echo "<option value='$a[status]'>$a[status]</option>";
                                    }
                                  }
                             echo "</select>
                    </td></tr>

                    <tr><th width='120px' scope='row'>keterangan</th> <td><input type='text' class='form-control' name='k' value='$s[ket_k]'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=kendaraan_keluar'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysql_query("INSERT INTO tb_kendaraan_keluar VALUE ('','$_POST[a]' ,'$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]')");
        echo "<script>document.location='index.php?view=kendaraan_keluar';</script>";
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Kendaraan Keluar</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Tgl Keluar</th> <td><input type='text' class='form-control' name='a'> </td></tr>
                    <tr><th width='120px' scope='row'>No.Registrasi Keluar</th> <td><input type='text' class='form-control' name='b'> </td></tr>
                    <tr><th scope='row'>Kendaraan</th>   <td><select class='form-control' name='c'> 
                                                <option value='0' selected>- Pilih No.Reg Kendaraan Masuk -</option>"; 
                                                $kendaraan_masuk = mysql_query("SELECT * FROM tb_kendaraan_masuk");
                                                while($a = mysql_fetch_array($kendaraan_masuk)){
                                                  echo "<option value='$a[no_regis]'>$a[no_regis]</option>";
                                                }
                                                echo "</select>
                    </td></tr>

                    <tr><th width='120px' scope='row'>DG.Sementara</th> <td><input type='text' class='form-control' name='d'> </td></tr>
                    <tr><th width='120px' scope='row'>Selesmen</th> <td><input type='text' class='form-control' name='e'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama Pelangan</th> <td><input type='text' class='form-control' name='f'> </td></tr>
                    <tr><th width='120px' scope='row'>No.KTP</th> <td><input type='text' class='form-control' name='g'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat</th> <td><input type='text' class='form-control' name='h'> </td></tr>
                    <tr><th width='120px' scope='row'>TLP/HP</th> <td><input type='text' class='form-control' name='i'> </td></tr>
                    
                    <tr><th scope='row'>Kendaraan</th>   <td><select class='form-control' name='j'> 
                                                <option value='0' selected>- Pilih Status -</option>"; 
                                                $status_keluar = mysql_query("SELECT * FROM tb_status");
                                                while($a = mysql_fetch_array($status_keluar)){
                                                  echo "<option value='$a[status]'>$a[status]</option>";
                                                }
                                                echo "</select>
                    </td></tr>

                    <tr><th width='120px' scope='row'>Keterangan</th> <td><input type='text' class='form-control' name='k'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=kendaraan_keluar'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";

    }elseif($_GET[act]=='detail'){
    $edit = mysql_query("SELECT a.*, b.* FROM tb_kendaraan_keluar a 
                                              JOIN tb_kendaraan_masuk b ON a.kendaraan=b.no_regis
                                                      where a.id_keluar='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Kendaraan Keluar </h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='140px' scope='row'>Tgl Keluar</th> <td>$s[tgl_keluar]</td></tr>
                    <tr><th scope='row'>No. Registrasi Kendaraan (Keluar)</th>       <td>$s[no_regis_keluar] </td></tr>
                    <tr bgcolor='orange'><th scope='row'>Keterangan Kendaraan</th><td></td></tr>

                    <tr><th scope='row'>No. Registrasi Kendaraan (Masuk)</th>           <td>$s[no_regis]</td></tr>
                    <tr><th scope='row'>Merek</th>        <td>$s[merek]</td></tr>
                    <tr><th scope='row'>Jenis</th>              <td>$s[jenis]</td></tr>
                    <tr><th scope='row'>Model</th>        <td>$s[model]</td></tr>
                    <tr><th scope='row'>Tahun CC</th>              <td>$s[tahun_cc]</td></tr>
                    <tr><th scope='row'>No.Rangka</th>      <td>$s[no_rangka]</td></tr>
                    <tr><th scope='row'>No.Mesin</th>    <td>$s[no_mesin]</td></tr>
                    <tr><th scope='row'>Ket.Gudang</th>           <td>$s[ket_gudang]</td></tr>
                    
                    <tr bgcolor='orange'><th scope='row'>Keterangan Keluar</th><td></td></tr>
                    <tr><th scope='row'>Selesmen</th>               <td>$s[nm_seles]</td></tr>
                    <tr><th scope='row'>DG.Sementara</th>                 <td>$s[dg_sementara]</td></tr>
                    <tr><th scope='row'>Nama Pelangan</th>             <td>$s[nm_pelangan]</td></tr>
                    <tr><th scope='row'>No.KTP</th>                 <td>$s[no_ktp]</td></tr>
                    <tr><th scope='row'>Alamat</th>                <td>$s[alamat]</td></tr>
                    <tr><th scope='row'>TLP/HP</th>                 <td>$s[tlp]</td></tr>
                    <tr><th scope='row'>Status</th>                 <td>$s[status_keluar]</td></tr>
                    <tr><th scope='row'>Keterangan</th>                 <td>$s[ket_k]</td></tr>

                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    
                    <a href='index.php?view=kendaraan_keluar'><button type='button' class='btn btn-default pull-right'>Kembali</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>