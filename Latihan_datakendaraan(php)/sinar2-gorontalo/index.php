<?php 
  session_start();
  error_reporting(0);
  include "config/koneksi.php";
  include "config/library.php";
  include "config/fungsi_indotgl.php";
  include "config/fungsi_seo.php";
  if (isset($_SESSION[id])){
      if ($_SESSION[level]=='superuser'){
          $iden = mysql_fetch_array(mysql_query("SELECT * FROM rb_users where id_user='$_SESSION[id]'"));
           $nama =  $iden[nama_lengkap];
           $level = 'Administrator';
           $foto = 'dist/img/user2-160x160.jpg';
      }elseif($_SESSION[level]=='kepala'){
          $iden = mysql_fetch_array(mysql_query("SELECT * FROM rb_users where id_user='$_SESSION[id]'"));
            $gu = mysql_fetch_array(mysql_query("SELECT * FROM rb_guru where nip='$iden[username]'"));
           $nama =  $iden[nama_lengkap];
           $level = 'Kepala Sekolah';
           if (trim($gu[foto])==''){
              $foto = 'foto_siswa/no-image.jpg';
           }else{
              $foto = 'foto_pegawai/'.$gu[foto];
           }     
     
      }elseif($_SESSION[level]=='petugas'){
          $iden = mysql_fetch_array(mysql_query("SELECT * FROM tb_petugas where id='$_SESSION[id]'"));
          $gu = mysql_fetch_array(mysql_query("SELECT * FROM rb_guru where nip='$iden[username]'")); 
          $nama =  $iden[nm_petugas];
           $level = 'petugas';
           if (trim($iden[foto])==''){
              $foto = 'foto_siswa/no-image.jpg';
           }else{
              $foto = 'foto_pegawai/'.$iden[foto];
           } 
      
      }

      
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT.SINAR GORONTALO BERLIAN MOTORS</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script language="javascript" type="text/javascript"> 
      var maxAmount = 160;
      function textCounter(textField, showCountField) {
        if (textField.value.length > maxAmount) {
          textField.value = textField.value.substring(0, maxAmount);
        } else { 
          showCountField.value = maxAmount - textField.value.length;
        }
      }

    </script>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
            <?php 
              if  ($_SESSION[level]=='kepala'){
                include "menu-kepsek.php";
              }elseif ($_SESSION[level]=='petugas'){
                include "menu-petugas.php";
              }else{
                include "menu-admin.php"; 
              }
            ?>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1> Dashboard <small>Control panel</small> </h1>
        </section>

        <section class="content">
        <?php 
          if ($_GET[view]=='home' OR $_GET[view]==''){
              if($_SESSION[level]=='siswa'){
                  include "application/home_siswa.php";
              }elseif($_SESSION[level]=='guru'){
                  include "application/home_guru.php";
              
              }else{
                  echo "<div class='row'>";
                          include "application/home_admin_row1.php";
                  echo "</div>
                        <div class='row'>";
                          include "application/home_admin_row2.php";
                  echo "</div>";
              }
          

            
          }elseif ($_GET[view]=='wakilkepala'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_wakilkepala.php";
            echo "</div>";
          }elseif ($_GET[view]=='admin'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_admin.php";
            echo "</div>";
          
          
          
          
          
          
          }elseif ($_GET[view]=='jenis_kendaraan'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_jenis_kendaraan.php";
            echo "</div>";

          }elseif ($_GET[view]=='kendaraan_masuk'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_kendaraan_masuk.php";
            echo "</div>";

          }elseif ($_GET[view]=='kendaraan_keluar'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_kendaraan_keluar.php";
            echo "</div>";
          
          }elseif ($_GET[view]=='petugas'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_petugas.php";
            echo "</div>";

          
          

          }
        ?>
        </section>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <script>
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        $('#example3').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200
        });
      });
      $('.datepicker').datepicker();
    </script>


    <div class="modal fade" id="nilaiessai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Berikan Siswa Nilai Essai</h4>
          </div>
          <form method='POST' action='index.php?view=soal&act=semuajawabansiswa&jdwl=<?php echo $_GET[jdwl]; ?>&idsoal=<?php echo $_GET[idsoal]; ?>&id=<?php echo $_GET[id]; ?>&kd=<?php echo $_GET[kd]; ?>&noinduk=<?php echo $_GET[noinduk]; ?>' class="form-horizontal">
            <div class="modal-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nilai Essai</label>
                  <div class="col-sm-10">
                    <input type="number" name='a' class="form-control">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name='nilaiessai' class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="essai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Soal Essai</h4>
          </div>
          <form method='POST' action='index.php?view=soal&act=semuasoal&jdwl=<?php echo $_GET[jdwl]; ?>&idsoal=<?php echo $_GET[idsoal]; ?>&id=<?php echo $_GET[id]; ?>&kd=<?php echo $_GET[kd]; ?>' class="form-horizontal">
            <div class="modal-body">
                

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Soal</label>
                  <div class="col-sm-10">
                    <textarea rows='6' name='a' class="form-control" placeholder="Tuliskan Soal Essai..."></textarea>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name='essai' class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="objektif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Soal Objektif</h4>
          </div>
          <form method='POST' action='index.php?view=soal&act=semuasoal&jdwl=<?php echo $_GET[jdwl]; ?>&idsoal=<?php echo $_GET[idsoal]; ?>&id=<?php echo $_GET[id]; ?>&kd=<?php echo $_GET[kd]; ?>' class="form-horizontal">
            <div class="modal-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Soal</label>
                  <div class="col-sm-10">
                    <textarea rows='3' name='a' class="form-control" placeholder="Tuliskan Soal Objektif..."></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jawab A</label>
                  <div class="col-sm-10">
                    <input style='width:50%' type="text" name='b' class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jawab B</label>
                  <div class="col-sm-10">
                    <input style='width:50%' type="text" name='c' class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jawab C</label>
                  <div class="col-sm-10">
                    <input style='width:50%' type="text" name='d' class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jawab D</label>
                  <div class="col-sm-10">
                    <input style='width:50%' type="text" name='e' class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jawab E</label>
                  <div class="col-sm-10">
                    <input style='width:50%' type="text" name='f' class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kunci</label>
                  <div class="col-sm-10">
                    <input style='width:50%' type="text" name='g' class="form-control">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name='objektif' class="btn btn-primary">Tambahkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<?php 
  }else{
    include "login.php";
  }
?>
