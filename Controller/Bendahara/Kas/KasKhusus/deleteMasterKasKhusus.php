<?php 
	@session_start();
	include "../../../../Config/ConfigDB.php";
	include "../../../../Config/Functions.php";
	include "../../../session.php";

		if(isset($_POST['delMtrKasKhusus'])){
			$id 			= $_POST['id'];
			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

			$deleteMasterKas = $db->query("DELETE FROM master_kas_khusus WHERE idMaster_kas = '$id' ") or die ($db->error);

			logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Master Kas Khusus');
		}
?>