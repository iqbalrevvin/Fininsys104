<?php 
include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";
include "Controller/Bendahara/Kas/KasRekap/statusKasQuery.php";
if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Rekapitulasi Kas');
	include "daftarKasRekap.php";
}
else{
}
?>