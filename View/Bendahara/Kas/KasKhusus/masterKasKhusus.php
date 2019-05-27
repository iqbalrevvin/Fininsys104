<?php 
$ID = @$_GET['ID'];
include "Config/ConfigDB.php";
include "Controller/Bendahara/Kas/KasKhusus/masterKasKhususQuery.php";
#include "admin/query/KasKhusus/Kelola/tabelKelolaKasKhususQr.php";
include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";

if(@$_GET['k']==''){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Kas Khusus');
	include "daftarKasKhusus.php";
	include "modal_addMasterKasKhusus.php";
}
elseif(@$_GET['k']=='Manage'){
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Kelola Kas Khusus');
    $scure = @$_GET['Scure'];
    $check=md5(md5($ID).md5('qwerty12345'));
    if($scure==$check){     
		$masterKasKhususQr = $db->query("SELECT * FROM master_kas_khusus WHERE idMaster_kas = '$ID' ORDER BY idMaster_kas");
	 	include "Config/ConfigDB.php";
    	include "Controller/Bendahara/Kas/KasKhusus/Kelola/tabelKelolaKasKhususQr.php";
    	include "Controller/Bendahara/Kas/KasKhusus/Kelola/statusKasKelolaQr.php";  
		include"Kelola/daftarKelolaKasKhusus.php";
		include"Kelola/modal_addDebitKasKhusus.php";
		include "Controller/Bendahara/Kas/KasKhusus/Kelola/addKelolaDebitKaskQr.php";
		include"Kelola/modal_addKreditKasKhusus.php";
		include "Controller/Bendahara/Kas/KasKhusus/Kelola/addKelolaKreditKaskQr.php";
		include "Controller/Bendahara/Kas/KasKhusus/Kelola/tabelKelolaKasKhususQr.php"; 
	}else{
		include "view/Other/404.html";
	}

}
?>