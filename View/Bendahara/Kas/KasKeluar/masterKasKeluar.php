<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Kas Keluar');
	echo '<div id="showKasKeluar"></div>';
	//include "showJnsTransaksi.php";
}
else{
}
?>