<?php
if(@$_GET['k'] == ''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Log Aktivitas');
	include"daftarLogAktivitasRealTime.php";
}elseif(@$_GET['k'] == 'ListLog'){
	#logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Daftar Log Aktivitas');
	include "Config/PaginationFunc.php";
	include "Controller/Administrator/LogAktivitas/DaftarLogAktivitas/TabelLogAktivitas.php";
	include"DaftarLogAktivitas/DaftarLogAktivitas.php";
}elseif(@$_GET['k'] == 'ReportLog'){
	
}else{
	include "view/Other/404.html";
} 
?>