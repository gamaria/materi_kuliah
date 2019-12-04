<?php 
session_start();
error_reporting(0);
include "config/koneksi.php"; 
include "config/fungsi_indotgl.php"; 
$r = mysql_query("SELECT * FROM tb_kendaraan_masuk where id_masuk='$_GET[id]'");

$read = mysql_fetch_array($r);

?>
<html>
<head>
<title>Detail Kendaraan Masuk</title>
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

<?php 
$ex = explode(' ', $r[waktu_input]);
echo "<table width='100%' border='1' id='tablemodul1' class='table daftar'>
  <tr><td><b>Tgl Keluar</b></td><td><b style='color:red'>$read[tgl_masuk]</b></td></tr>
   <tr><td><b>No.Registrasi Masuk</b></td><td><b style='color:red'>$read[no_regis]</b></td></tr>
   <tr><td width=150px></td>  <td></td></tr> </table>
   <h4>Keterangan Kendaraan</h4>
   <table width='100%' border='1' id='tablemodul1' class='table daftar'>
   
   <tr><td width=150px>Merek</td>  <td>$read[merek]</td></tr>
   <tr><td width=150px>Jenis</td>  <td>$read[jenis]</td></tr>
   <tr><td width=150px>Model</td>  <td>$read[model]</td></tr>
   <tr><td width=150px>Tahun CC</td>  <td>$read[tahun_cc]</td></tr>
   <tr><td width=150px>No Rangka</td>  <td>$read[no_rangka]</td></tr>
   <tr><td width=150px>No.Mesin</td>  <td>$read[no_mesin]</td></tr>
   <tr><td width=150px>Status</td>  <td>$read[status_]</td></tr>
   <tr><td width=150px>Status</td>  <td>$read[ket_gudang]</td></tr>
   <tr><td width=150px>Ket.Gudang</td>  <td>$read[ket_masuk]</td></tr> </table>
   
   
</table>";

?>
<table style='border:1px solid #000; background:#e3e3e3; font-size:11px; ' width='100%'>
<tr> <td></td> <td>Mengetahui,</td></tr>
<tr> <td></td> <td>Kepala bidang</td></tr>
<tr> <td></td> <td></td></tr>
<tr> <td></td> <td></td></tr>
<tr> <td></td> <td></td></tr>
<tr> <td></td> <td>(___________)</td></tr>
<tr></tr>

<tr><td><b>Data Kendaraan Masuk :</b></td></tr>
<tr><td>- No.Registrasi Kendaraan Masuk</td></tr>
<tr><td>- Keterangan Pembelian></td></tr>
</table>
</body>
</html>