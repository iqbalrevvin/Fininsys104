<?php
#$dftKasQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
#								WHERE kas.tipe_kas = 'MASUK' AND month(tgl_kas) = '$now' ORDER BY kas.tgl_input DESC") 
#								or die ($db->error);
$now = date('m');
$day = date('d');
$thn = date('Y');
$kemarin = date('d')-1;
$blnKemarin = date('m')-1;

#Jumlah Transaksi Masuk
$jmlTransaksi = $db->query("SELECT count(idKas) AS jumlah FROM kas WHERE month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);
$transaksi = $jmlTransaksi->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Masuk Hari Ini
$jmlUangMasukHari = $db->query("SELECT sum(jml_kas_masuk) AS jumlah FROM kas WHERE day(tgl_kas) = '$day' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);	
$uangMasukHari = $jmlUangMasukHari->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Masuk Bulan Ini
$jmlUangMasuk = $db->query("SELECT sum(jml_kas_masuk) AS jumlah FROM kas WHERE month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);	
$uangMasukBulan = $jmlUangMasuk->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Masuk Kemarin
$jmlUangMasukKemarin = $db->query("SELECT sum(jml_kas_masuk) AS jumlah FROM kas WHERE day(tgl_kas) = '$kemarin' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);	
$uangMasukKemarin = $jmlUangMasukKemarin->fetch_object();
#-----------------------------------------------------------------------------------------------
#Jumlah Uang Masuk Bulan Ini
$jmlUangMasukBlnKemarin = $db->query("SELECT sum(jml_kas_masuk) AS jumlah FROM kas WHERE month(tgl_kas) = '$blnKemarin' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);	
$uangMasukBlnKemarin = $jmlUangMasukBlnKemarin->fetch_object();
#-----------------------------------------------------------------------------------------------
#Perbandingan Kas
error_reporting(0);
$perbandingan = ($uangMasukBulan->jumlah / $uangMasukBlnKemarin->jumlah)*100;
/*$keterangan = $perbandingan>200?"Sangat Baik Sekali":
			  $perbandingan>=100?"Sangat Baik":
			  $perbandingan>100?"Baik":
			  $perbandingan>80?"Cukup":
			  $perbandingan>50?"Buruk":
			  $perbandingan>25?"Sangat Buruk"
			  "Sangat Buruk Sekali"; */
#$keterangan = $masuk>$keluar?"Pemasukan":"Pengeluaran";
if($perbandingan > 200){
	$keterangan = "Sangat Baik Sekali";
}elseif($perbandingan > 100){
	$keterangan = "Sangat Baik";
}elseif($perbandingan > 80){
	$keterangan = "Cukup Baik";
}elseif($perbandingan > 40){
	$keterangan = "Kurang Baik";
}elseif($perbandingan > 20){
	$keterangan = "Cukup Buruk";
}elseif($perbandingan > 1){
	$keterangan = "Sangat Buruk";
}else{
	$keterangan = "(Belum Terdeteksi)";
}
#-----------------------------------------------------------------------------------------------
?>