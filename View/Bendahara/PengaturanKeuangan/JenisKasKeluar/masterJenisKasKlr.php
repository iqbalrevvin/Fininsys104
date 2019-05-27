<?php 
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Pengaturan Jenis Kas Keluar');
	include "Config/configdb.php";
	include "COntroller/Bendahara/PengaturanKeuangan/JenisKasKeluar/tabelJenisKasKlr.php";	
	include "daftarJenisKasKlr.php";
	include "modal_addJenisKasKlr.php";
}
else{
}
?>