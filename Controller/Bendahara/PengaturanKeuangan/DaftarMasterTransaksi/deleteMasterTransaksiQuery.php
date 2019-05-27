<?php
@session_start();
include "../../../../Config/ConfigDB.php";
include "../../../../Config/Functions.php";
include "../../../Session.php";
	if(isset($_POST['delMasterTransaksi'])){
		$id=$_POST['id'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

	mysqli_query($db,"DELETE FROM master_transaksi WHERE idMaster_transaksi = '$id'");

	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Master Pembayaran');
}
?>