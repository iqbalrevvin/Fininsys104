<?php
@session_start();
$ID = @$_GET['ID'];
if(@$_GET['k'] == '') {
    require_once "View/Other/Loading.php";
    include"Controller/Administrator/DataPengguna/tabelDataPenggunaQuery.php";
    include"daftarDataPengguna.php";
    include"modal_addDataPengguna.php";
}elseif($_GET['k'] == 'UserProfile'){
	//include "admin/page/PengaturanData/ProfilAdmin/profilAdmin.php";
	$ID = @$_GET['ID'];
    $secure = @$_GET['Secure'];
    $check=md5(md5($ID).md5('qwerty12345'));
    if($secure==$check){     
    include "View/Bendahara/PengaturanData/ProfilAdmin/profilAdmin.php";
    }else{
        include"404.html";
    }
}
?>
