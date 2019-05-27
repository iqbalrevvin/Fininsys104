<?php
	@session_start();
	include "../../../Config/ConfigDB.php";
	include "../../../Config/Functions.php";
	include "../../Session.php";

	if(isset($_POST['del'])){
		$id=$_POST['id'];
		#Log Aktivitas
		$idUsers    	= $session['idUsers'];
		$level      	= $session['level'];
		$namaTmpln  	= $session['nama_tampilan'];
		$tglAct     	= date("Y-m-d");
		$jamAct     	= date("H:i:s");
		$tglJamAct  	= date("Y-m-d H:i:s");
		//$mac      	= 
		$deskirpLog		= 'Hapus Transaksi Pembayaran Dengan No. Transaksi ' .$id. '';

	$delTransaksi = mysqli_query($db,"DELETE FROM transaksi WHERE no_transaksi = '$id'") or die($db->error);
	
	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskirpLog);
}
?>
