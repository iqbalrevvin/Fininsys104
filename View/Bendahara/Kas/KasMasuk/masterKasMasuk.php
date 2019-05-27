<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Kas Masuk');
	echo '<div id="showKasMasuk"></div>';
	//include "showJnsTransaksi.php";
}
else{
}
?>