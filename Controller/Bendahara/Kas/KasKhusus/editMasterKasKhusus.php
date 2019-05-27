<?php
	@session_start();
	include "../../../../Config/configdb.php";
	include "../../../../Config/Functions.php";
	include "../../../session.php";

		if(isset($_POST['editMtrKasKhusus'])){
			$id 							= $_POST['id'];
			$namaMasterKasKhusus          	= $_POST['namaMasterKasKhusus'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

			$updateMasterKas = $db->query("UPDATE master_kas_khusus SET nama_master_kas = '$namaMasterKasKhusus' WHERE idMaster_kas = '$id' ") 
			or die ($db->error);

			logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Master Kas Khusus');

		}
?>