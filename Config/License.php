<?php
function license(){
//KONEKSI DATABASE ONLINE
$dbhost = 'arbetudo.com'; 
$dbuser = 'arbetudo';     
$dbpass = '<*Iqz220195*>';         
$dbname = 'arbetudo_fininsys_lisensi';
$dbOnline = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($dbOnline->connect_error) {
   header("location:../View/Other/error-databaseonline.html");
}
//CEK DATA LISENSI ONLINE
$cekLisenOnline = $dbOnline->query("SELECT * FROM fininsys_lisensi") or die ($dbOnline->error);
$lisenOnline = $cekLisenOnline->fetch_object();
$lisen_npsn_online = $lisenOnline->npsn;
$lisen_no_online = $lisenOnline->no_lisensi;
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------

//KONEKSI DATABASE LOKAL
$dbhost = 'localhost'; 
$dbuser = 'root';     
$dbpass = '';         
$dbname = 'si-pembayaran';
$dbLocal = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($dbLocal->connect_error) {
   header("location:./View/Other/error-databaselokal.html");
}
//CEK DATA LISENSI LOKAL
$cekLisenLokal = $dbLocal->query("SELECT * FROM lisensi") or die ($dbLocal->error);
$lisenLokal = $cekLisenLokal->fetch_object();
$lisen_npsn_lokal = $lisenLokal->npsn;
$lisen_no_lokal = $lisenLokal->no_lisensi;
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------



//CEK DATA NPSN SEKOLAH
$cekNPSN = $dbLocal->query("SELECT npsn FROM sekolah") or die ($dbLocal->error);
$dataNPSN = $cekNPSN->fetch_object();
$npsn = $dataNPSN->npsn;
//CEK APAKAH NISN SEKOLAH SEKOLAH SESUAI DENGAN NISN LISENSI
if($lisen_npsn_lokal != $npsn){
	header("location:./NPSN-NOT-VALID");
}
//--------------------------------------------------------------------------------------------------------

// CEK APAKAH LISENSI TERSEDIA UNTUK NPSN INI
$cekLisensiNpsn = $dbOnline->query("SELECT npsn FROM fininsys_lisensi WHERE npsn = $lisen_npsn_lokal") or die ($dbOnline->error);
if($cekLisensiNpsn->num_rows < 1){
	header("location:./NPSN-NOT-VALID");
}
//--------------------------------------------------------------------------------------------------------

// CEK APAKAH NOMOR LISENSI LOKAL DAN ONLINE SUDAH SESUAI
$cekNoLisensi = $dbOnline->query("SELECT No_lisensi FROM fininsys_lisensi WHERE no_lisensi = $lisen_no_lokal") or die ($dbOnline->error);
if($cekNoLisensi->num_rows < 1){
	header("location:./LicenseOutdate");
}elseif($lisen_npsn_lokal != $npsn){
	header("location:./NPSN-NOT-VALID");
}elseif($cekLisensiNpsn->num_rows < 1){
	header("location:./NPSN-NOT-VALID");
}else{
	header('location:Fininsys');
}
//--------------------------------------------------------------------------------------------------------

#echo "$lisen_npsn_lokal";
return;
}
license();
?>