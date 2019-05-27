<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Pengaturan Master Pembayaran');
	echo '<div id="showMasterTransaksi"></div>';
	//include "showJnsTransaksi.php";
}
else{
}
?>