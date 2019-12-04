<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kendaraan Masuk </h3>
                  <?php if($_SESSION[level]='kepala')  { ?>
                   
                    <a class='pull-right btn btn-danger btn-sm' target='_BLANK' href='print-data-masuk.php'>Print Data Kendaraan Masuk</a>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=kendaraan_masuk&act=tambah'>Tambahkan Data</a>
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Tgl Masuk</th>
                        <th>No Register</th>
                        <th>Merek</th>
                        <th>Jenis</th>
                        <th>Model</th>
                        <th>Thn CC</th>
                        <th>No Rangka</th>
                        <th>No Mesin</th>
                        <th>Ket Gudang</th>
                        <th>Status</th>
                        
                        <?php if($_SESSION[level]='kepala'){ ?>
                          
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM tb_kendaraan_masuk ORDER BY id_masuk DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                    <td><a href='?view=kendaraan_masuk&act=detail&id=$r[id_masuk]'>$r[tgl_masuk]</a></td>
                              
                              <td>$r[no_regis]</td>
                              <td>$r[merek]</td>
                              <td>$r[jenis]</td>
                              <td>$r[model]</td>
                              <td>$r[tahun_cc]</td>
                              <td>$r[no_rangka]</td>
                              <td>$r[no_mesin]</td>
                              <td>$r[ket_gudang]</td>
                              <td>$r[status_]</td>";
                              
                              if($_SESSION[level]='kepala') {
                        echo "<td><center>
                            <a class='btn btn-success btn-xs' target='_BLANK' title='Print detail kendaraan masuk' href='print-detail-masuk.php?id=$r[id_masuk]'><span class='glyphicon glyphicon-print'></span> 1</a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=kendaraan_masuk&act=edit&id=$r[id_masuk]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=kendaraan_masuk&hapus=$r[id_masuk]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }

                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM tb_kendaraan_masuk where id_masuk='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=kendaraan_masuk';</script>";
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
        mysql_query("UPDATE tb_kendaraan_masuk SET tgl_masuk = '$_POST[a]',
                                         no_regis = '$_POST[k]',
                                         merek = '$_POST[b]',
                                         jenis = '$_POST[c]',
                                         model = '$_POST[d]',
                                         tahun_cc = '$_POST[e]',
                                         no_rangka = '$_POST[f]',
                                         no_mesin = '$_POST[g]',
                                         ket_gudang = '$_POST[h]',
                                         status_ = '$_POST[i]',
                                         ket_masuk = '$_POST[j]' where id_masuk='$_POST[id]'");
      echo "<script>document.location='index.php?view=kendaraan_masuk';</script>";
    }
    $edit = mysql_query("SELECT * FROM tb_kendaraan_masuk where id_masuk='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Kendaraan Masuk</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_masuk]'>
                    <tr><th width='120px' scope='row'>Tgl Masuk</th> <td><input type='text' class='form-control' name='a' value='$s[tgl_masuk]'> </td></tr>
                    <tr><th width='120px' scope='row'>No.Registrasi</th> <td><input type='text' class='form-control' name='k' value='$s[no_regis]'> </td></tr> 
                    <tr><th scope='row'>Merek</th> <td><select class='form-control' name='b'> 
                             <option value='0' selected>- Pilih Jenis Kendaraan -</option>"; 
                              $jenis_kendaraan = mysql_query("SELECT * FROM tb_jkendaraan");
                                  while($a = mysql_fetch_array($jenis_kendaraan)){
                                    if ($s[merek]==$a[merek]){
                                       echo "<option value='$a[merek]' selected>$a[merek]</option>";
                                    }else{
                                       echo "<option value='$a[merek]'>$a[merek]</option>";
                                    }
                                  }
                             echo "</select>
                    </td></tr>

                    
                    <tr><th width='120px' scope='row'>jenis</th> <td><input type='text' class='form-control' name='c' value='$s[jenis]'> </td></tr>
                    <tr><th width='120px' scope='row'>model</th> <td><input type='text' class='form-control' name='d' value='$s[model]'> </td></tr>
                    <tr><th width='120px' scope='row'>tahun_cc</th> <td><input type='text' class='form-control' name='e' value='$s[tahun_cc]'> </td></tr>
                    <tr><th width='120px' scope='row'>no_rangka</th> <td><input type='text' class='form-control' name='f' value='$s[no_rangka]'> </td></tr>
                    <tr><th width='120px' scope='row'>no_mesin</th> <td><input type='text' class='form-control' name='g' value='$s[no_mesin]'> </td></tr>
                    <tr><th width='120px' scope='row'>ket_gudang</th> <td><input type='text' class='form-control' name='h' value='$s[ket_gudang]'> </td></tr>
                    <tr><th width='120px' scope='row'>status_</th> <td><input type='text' class='form-control' name='i' value='$s[status_]'> </td></tr>
                    <tr><th width='120px' scope='row'>ket_masuk</th> <td><input type='text' class='form-control' name='j' value='$s[ket_masuk]'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=kendaraan_masuk'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysql_query("INSERT INTO tb_kendaraan_masuk VALUE ('','$_POST[a]' ,'$_POST[k]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]')");
        echo "<script>document.location='index.php?view=kendaraan_masuk';</script>";
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Kendaraan Masuk</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Tgl Masuk</th> <td><input type='text' class='form-control' name='a'> </td></tr>
                    <tr><th width='120px' scope='row'>No.Registrasi</th> <td><input type='text' class='form-control' name='k'> </td></tr>
                    <tr><th scope='row'>Merek</th>   <td><select class='form-control' name='b'> 
                                                <option value='0' selected>- Pilih Jenis Kendaraan -</option>"; 
                                                $jenis_kendaraan = mysql_query("SELECT * FROM tb_jkendaraan");
                                                while($a = mysql_fetch_array($jenis_kendaraan)){
                                                  echo "<option value='$a[merek]'>$a[merek]</option>";
                                                }
                                                echo "</select>
                    </td></tr>

                    <tr><th width='120px' scope='row'>Jenis</th> <td><input type='text' class='form-control' name='c'> </td></tr>
                    <tr><th width='120px' scope='row'>Model</th> <td><input type='text' class='form-control' name='d'> </td></tr>
                    <tr><th width='120px' scope='row'>Tahun CC</th> <td><input type='text' class='form-control' name='e'> </td></tr>
                    <tr><th width='120px' scope='row'>No.Rangka</th> <td><input type='text' class='form-control' name='f'> </td></tr>
                    <tr><th width='120px' scope='row'>No.Mesin</th> <td><input type='text' class='form-control' name='g'> </td></tr>
                    <tr><th width='120px' scope='row'>Ket.Gudang</th> <td><input type='text' class='form-control' name='h'> </td></tr>
                    <tr><th width='120px' scope='row'>status</th> <td><input type='text' class='form-control' name='i'> </td></tr>
                    <tr><th width='120px' scope='row'>Keterangan</th> <td><input type='text' class='form-control' name='j'> </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=kendaraan_masuk'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";

}elseif($_GET[act]=='detail'){
  $edit = mysql_query("SELECT * FROM tb_kendaraan_masuk where id_masuk='$_GET[id]'");
  $s = mysql_fetch_array($edit);
  echo "<div class='col-md-12'>
            <div class='box box-info'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Detail Data Kendaraan Masuk </h3>
              </div>
            <div class='box-body'>
            <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
              <div class='col-md-12'>
                <table class='table table-condensed table-bordered'>
                <tbody>
                  <tr><th width='140px' scope='row'>Tgl Masuk</th> <td>$s[tgl_keluar]</td></tr>
                  <tr><th scope='row'>No. Registrasi</th>       <td>$s[no_regis] </td></tr>
                  <tr bgcolor='orange'><th scope='row'>Keterangan Kendaraan</th><td></td></tr>

                           
                  <tr><th scope='row'>Merek</th>        <td>$s[merek]</td></tr>
                  <tr><th scope='row'>Jenis</th>              <td>$s[jenis]</td></tr>
                  <tr><th scope='row'>Model</th>        <td>$s[model]</td></tr>
                  <tr><th scope='row'>Tahun CC</th>              <td>$s[tahun_cc]</td></tr>
                  <tr><th scope='row'>No.Rangka</th>      <td>$s[no_rangka]</td></tr>
                  <tr><th scope='row'>No.Mesin</th>    <td>$s[no_mesin]</td></tr>
                  <tr><th scope='row'>Ket.Gudang</th>           <td>$s[ket_gudang]</td></tr>
                  <tr><th scope='row'>No.Mesin</th>    <td>$s[status_]</td></tr>
                  <tr><th scope='row'>No.Mesin</th>    <td>$s[ket_masuk]</td></tr>
                  
                  

                </tbody>
                </table>
              </div>
            </div>
            <div class='box-footer'>
                  
                  <a href='index.php?view=kendaraan_masuk'><button type='button' class='btn btn-default pull-right'>Kembali</button></a>
                  
                </div>
            </form>
          </div>";
}

?>