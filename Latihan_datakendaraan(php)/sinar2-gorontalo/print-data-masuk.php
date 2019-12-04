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
<h1>Data Kendaraan Masuk</h1>
<table border='1' id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Tgl Masuk</th>
                        <th>No.Reg.Masuk</th>
                        <th>Merek</th>
                        <th>Jenis</th>
                        <th>Tahun CC</th>
                        <th>No.Rangka</th>
                        <th>No.Mesin</th>
                        <th>Ket.Gudang</th>
                        <th>Status_</th>
                        <th>ket_masuk</th>
                        
                        <?php if($_SESSION[level]!='kepala'){ ?>
                        
                        <?php } ?>
                      </tr>
                      <?php 
                    $tampil = mysql_query("SELECT * FROM tb_kendaraan_masuk ORDER BY id_masuk DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                            
                              <td>$r[tgl_masuk]</a></td>
                              <td>$r[no_regis]</td>
                              
                              <td>$r[merek]</td>
                              <td>$r[jenis]</td>
                              <td>$r[tahun_cc]</td>
                              <td>$r[no_rangka]</td>
                              <td>$r[no_mesin]</td>
                              <td>$r[ket_gudang]</td>
                              <td>$r[status_]</td>
                              
                              <td>$r[ket_masuk]</td>";

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