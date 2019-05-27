<?php
#$dftKasQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
#								WHERE kas.tipe_kas = 'MASUK' AND month(tgl_kas) = '$now' ORDER BY kas.tgl_input DESC") 
#								or die ($db->error);
$now = date('m');
$day = date('d');
$thn = date('Y');
$kemarin = date('d')-1;
$blnKemarin = date('m')-1;


#Jumlah Transaksi Keluar
$jmlTransaksi = $db->query("SELECT count(idKas) AS jumlah FROM kas WHERE month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);
$transaksi = $jmlTransaksi->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Keluar Hari Ini
$jmlUangKlrHari = $db->query("SELECT sum(jml_kas_keluar) AS jumlah FROM kas WHERE day(tgl_kas) = '$day' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);	
$uangKlrHari = $jmlUangKlrHari->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Keluar Bulan Ini
$jmlUangKlr = $db->query("SELECT sum(jml_kas_keluar) AS jumlah FROM kas WHERE month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);	
$uangKlrBulan = $jmlUangKlr->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Keluar Kemarin
$jmlUangKlrKemarin = $db->query("SELECT sum(jml_kas_keluar) AS jumlah FROM kas WHERE day(tgl_kas) = '$kemarin' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);	
$uangKlrKemarin = $jmlUangKlrKemarin->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Keluar Bulan Ini
$jmlUangKlrBlnKemarin = $db->query("SELECT sum(jml_kas_keluar) AS jumlah FROM kas WHERE month(tgl_kas) = '$blnKemarin' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);	
$uangKlrBlnKemarin = $jmlUangKlrBlnKemarin->fetch_object();
#-----------------------------------------------------------------------------------------------
#Perbandingan Kas
error_reporting(0);	
$perbandingan = ($uangKlrBulan->jumlah / $uangKlrBlnKemarin->jumlah)*100;
/*$keterangan = $perbandingan>200?"Sangat Baik Sekali":
			  $perbandingan>=100?"Sangat Baik":
			  $perbandingan>100?"Baik":
			  $perbandingan>80?"Cukup":
			  $perbandingan>50?"Buruk":
			  $perbandingan>25?"Sangat Buruk"
			  "Sangat Buruk Sekali"; */
#$keterangan = $masuk>$keluar?"Pemasukan":"Pengeluaran";		  
if($perbandingan > 200){
	$keterangan = "Sangat Buruk";
}elseif($perbandingan > 100){
	$keterangan = "Cukup Buruk";
}elseif($perbandingan > 80){
	$keterangan = "Kurang Baik";
}elseif($perbandingan > 40){
	$keterangan = "Cukup Baik";
}elseif($perbandingan > 20){
	$keterangan = "Sangat Baik";
}elseif($perbandingan > 1){
	$keterangan = "Sangat Baik Sekali";
}else{
	$keterangan = "(Belum Terdeteksi)";
}

#-----------------------------------------------------------------------------------------------
?>