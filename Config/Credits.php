<?php
	function credits(){
		include"View/Other/loading.php";
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
$cekLisenOnline = $dbOnline->query("SELECT * FROM fininsys_lisensi");
$lisenOnline = $cekLisenOnline->fetch_object();
$lisen_npsn_online = $lisenOnline->npsn;
$lisen_no_online = $lisenOnline->no_lisensi;
$lisen_namaSekolah = $lisenOnline->nama_sekolah;
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

// CEK APAKAH NAMA SEKOLAH DENGAN LISENSI INI ADA
$cekNoLisensi = $dbOnline->query("SELECT no_lisensi FROM fininsys_lisensi WHERE no_lisensi = $lisen_no_lokal") or die ($dbOnline->error);
if($cekNoLisensi->num_rows == 1){
	$namaSekolah = $lisen_namaSekolah;
}else{
	$namaSekolah = 'LISENSI TIDAK VALID';
}
echo "$namaSekolah";
return;
}
//--------------------------------------------------------------------------------------------------------
?>