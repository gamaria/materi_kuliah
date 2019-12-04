            <a style='color:#000' href='index.php?view=kendaraan_masuk'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                <?php $kendaraan_masuk = mysql_fetch_array(mysql_query("SELECT count(*) as total FROM tb_kendaraan_masuk")); ?>
                  <span class="info-box-text">Kendaraan Masuk</span>
                  <span class="info-box-number"><?php echo $kendaraan_masuk[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=kendaraan_keluar'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                <?php $kendaraan_keluar = mysql_fetch_array(mysql_query("SELECT count(*) as total FROM tb_kendaraan_keluar")); ?>
                  <span class="info-box-text">Kendaraan Keluar</span>
                  <span class="info-box-number"><?php echo $kendaraan_keluar[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=jenis_kendaraan'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                <?php $jenis_kendaraan = mysql_fetch_array(mysql_query("SELECT count(*) as total FROM tb_jkendaraan")); ?>
                  <span class="info-box-text">Jenis Kendaraan</span>
                  <span class="info-box-number"><?php echo $jenis_kendaraan[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            