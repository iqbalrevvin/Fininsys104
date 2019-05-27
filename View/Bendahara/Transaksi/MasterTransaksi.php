<?php
@session_start();
include "Config/ConfigDB.php";
include "Controller/Session.php";
$inv = @$_GET['Inv'];
	if(@$_GET['k'] == '') { 
		include "View/Other/Loading.php";
		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Transaksi');
		include"View/Bendahara/Transaksi/TransaksiBaru.php";
	}elseif($_GET['k'] == 'Print'){
		include "View/Other/Loading.php";
		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Navigasi Ke Halaman Cetak Transaksi');
		include "Controller/Bendahara/Invoice/InvoiceQr.php";
		$transaksi = mysqli_fetch_array($cetakTransaksiQuery); 
		$inv = @$_GET['Inv'];
    	$scure = @$_GET['Scure'];
    	$check=md5(md5($inv).md5('qwerty12345'));
    	if($scure==$check){     
		include "View/Bendahara/Invoice/Invoice.php";
		}else{
			include"View/Other/404.html";
		}
	}else{
		include"View/Other/404.html";
	}
?>