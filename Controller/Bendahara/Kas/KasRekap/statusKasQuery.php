<?php
#$dftKasQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
#								WHERE kas.tipe_kas = 'MASUK' AND month(tgl_kas) = '$now' ORDER BY kas.tgl_input DESC") 
#								or die ($db->error);
$now = date('m');
$day = date('d');
$thn = date('Y');
$kemarin = date('d')-1;
$blnKemarin = date('m')-1;

#JUMLAH UANG MASUK HARI INI
$jmlHrIniMsk 	= $db->query("SELECT sum(jml_kas_masuk) AS jumlah FROM kas WHERE day(tgl_kas) = '$day' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);
$hrIniMsk 		= $jmlHrIniMsk->fetch_object();
#-----------------------------------------------------------------------------------------------
#JUMLAH UANG MASUK BULAN INI
$jmlBlnIniMsk = $db->query("SELECT sum(jml_kas_masuk) AS jumlah FROM kas WHERE month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'MASUK' ") or die ($db->error);
$blnIniMsk = $jmlBlnIniMsk->fetch_object();
#-----------------------------------------------------------------------------------------------
#JUMLAH UANG KELUAR HARI INI
$jmlHrIniKlr = $db->query("SELECT sum(jml_kas_keluar) AS jumlah FROM kas WHERE day(tgl_kas) = '$day' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);
$hrIniKlr = $jmlHrIniKlr->fetch_object();
#-----------------------------------------------------------------------------------------------
#JUMLAH UANG KELUAR BULAN INI
$jmlBlnIniKlr = $db->query("SELECT sum(jml_kas_keluar) AS jumlah FROM kas WHERE month(tgl_kas) = '$now' AND year(tgl_kas) = '$thn' AND tipe_kas = 'KELUAR' ") or die ($db->error);	
$blnIniKlr = $jmlBlnIniKlr->fetch_object();
#-----------------------------------------------------------------------------------------------
#PERBANDINGAN KAS HARI INI
error_reporting(0);	
$perbnHari = ($hrIniKlr->jumlah / $hrIniMsk->jumlah)*100;
if($perbnHari > 200){
	$ketHari = "Sangat Buruk";
}elseif($perbnHari > 100){
	$ketHari = "Cukup Buruk";
}elseif($perbnHari > 80){
	$ketHari = "Kurang Baik";
}elseif($perbnHari > 40){
	$ketHari = "Cukup Baik";
}elseif($perbnHari > 20){
	$ketHari = "Sangat Baik";
}elseif($perbnHari > 1){
	$ketHari = "Sangat Baik Sekali";
}else{
	$ketHari = "(Belum Terdeteksi)";
}
#-----------------------------------------------------------------------------------------------
#Perbandingan Kas
error_reporting(0);	
$perbnBln = ($blnIniKlr->jumlah / $blnIniMsk->jumlah)*100;
	  
if($perbnBln > 200){
	$ketBln = "Sangat Buruk";
}elseif($perbnBln > 100){
	$ketBln = "Cukup Buruk";
}elseif($perbnBln > 80){
	$ketBln = "Kurang Baik";
}elseif($perbnBln > 40){
	$ketBln = "Cukup Baik";
}elseif($perbnBln > 20){
	$ketBln = "Sangat Baik";
}elseif($perbnBln > 1){
	$ketBln = "Sangat Baik Sekali";
}else{
	$ketBln = "(Belum Terdeteksi)";
}

#-----------------------------------------------------------------------------------------------
?>