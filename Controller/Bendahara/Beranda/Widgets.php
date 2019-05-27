<?php
$Hari = date('d');
$Bulan = date('m');
$Tahun = date('Y');
//Transaksi Berhasil--------------------------------------------------------------
$transaksiQuery = mysqli_query($db, "SELECT idTransaksi FROM transaksi WHERE month(tgl_transaksi) = '$Bulan' 
                                       AND year(tgl_transaksi) = '$Tahun'") or die($db->error);
$jmlTransaksi   = mysqli_num_rows($transaksiQuery);

//Transaksi Bulan Ini-----------------------------------------------------------------------
$transaksiBulan =   mysqli_query($db, "select SUM(jumlah_bayar) AS transBulan FROM transaksi 
                                       WHERE month(tgl_transaksi) = '$Bulan'");
$bulan  =   mysqli_fetch_array($transaksiBulan);  

//Transaksi Hari Ini-----------------------------------------------------------------------

$transaksiHari =   mysqli_query($db, "select SUM(jumlah_bayar) AS transHari FROM transaksi 
                                       WHERE day(tgl_transaksi) = '$Hari' 
                                       AND month(tgl_transaksi) = '$Bulan' 
                                       AND year(tgl_transaksi) = '$Tahun' ");
$hari  =   mysqli_fetch_array($transaksiHari);     

//Jumlah Siswa---------------------------------------------------------------------------
$SiswaQuery = mysqli_query($db, "SELECT idSiswa FROM siswa") or die($db->error);
$jmlSiswa   = mysqli_num_rows($SiswaQuery);             
?>