<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Pengaturan Jenis Kas Masuk');
	include "Config/ConfigDB.php";
	include "Controller/Bendahara/PengaturanKeuangan/JenisKasMasuk/tabelJenisKasMsk.php";	
	include "daftarJenisKasMsk.php";
	include "modal_addJenisKasMsk.php";
}
else{
}
?>