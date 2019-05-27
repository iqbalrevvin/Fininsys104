<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Pengaturan Jenis Pembayaran');
	echo '<div id="showJnsTransaksi"></div>';
	//include "showJnsTransaksi.php";
}
else{
}
?>