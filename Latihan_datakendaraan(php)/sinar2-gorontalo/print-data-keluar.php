<?php 
session_start();
error_reporting(0);
include "config/koneksi.php"; 
include "config/fungsi_indotgl.php"; 


?>
<html>
<head>
<title>Detail Kendaraan Keluar</title>
<link rel="stylesheet" href="bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<table style='border:1px solid #000' border='0' width='100%'>
  <tr>
    <td width=120px><img style='width:90px; margin-top:7px' src='print_raport/logo.png'></td>
    <td><center>PT.Sinar Gorontalo Berlian Motors<br> Jl.Raya Bastiong Karance</center></td>
    <td width=120px></td>
  </tr>
</table>
<br>
<h1>Data Kendaraan Keluar</h1>
<table border='1' id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Tgl Keluar</th>
                        <th>No R.Keluar</th>
                        <th>No.Reg.Masuk(kendaraan))</th>
                        <th>Merek</th>
                        <th>Jenis</th>
                        <th>Tahun CC</th>
                        <th>No.Rangka</th>
                        <th>No.Mesin</th>
                        <th>Selesmen</th>
                        <th>Pembeli</th>
                        <th>Status</th>
                        <?php if($_SESSION[level]!='kepala'){ ?>
                        
                        <?php } ?>
                      </tr>
                      <?php 
                    $tampil = mysql_query("SELECT a.*, b.* FROM tb_kendaraan_keluar a JOIN tb_kendaraan_masuk b ON a.kendaraan=b.no_regis ORDER BY id_keluar DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                            
                              <td>$r[tgl_keluar]</a></td>
                              <td>$r[no_regis_keluar]</td>
                              <td>$r[kendaraan]</td>
                              <td>$r[merek]</td>
                              <td>$r[jenis]</td>
                              <td>$r[tahun_cc]</td>
                              <td>$r[no_rangka]</td>
                              <td>$r[no_mesin]</td>
                              <td>$r[nm_seles]</td>
                              <td>$r[nm_pelangan]</td>
                              
                              <td>$r[status_keluar]</td>";

                              if($_SESSION[level]!='kepala'){
                        echo "
                        
                                
                               
                                
                                
                                
                              ";
                              }
                            echo "</tr>";
                      $no++;
                      
                      } ?>
                    </thead>
                    <tbody>
                 


</body>
</html>