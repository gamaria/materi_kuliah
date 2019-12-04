<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              
              
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tag"></i> <span>Data Kendaraan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=jenis_kendaraan"><i class="fa fa-circle-o"></i> Data Jenis Kendaraaan</a></li>
                <li><a href="index.php?view=kendaraan_masuk"><i class="fa fa-circle-o"></i> Data Kendaraan Masuk</a></li>
                <li><a href="index.php?view=kendaraan_keluar"><i class="fa fa-circle-o"></i> Data Kendaraan Keluar</a></li>
                
              </ul>
            </li>
           
        </section>