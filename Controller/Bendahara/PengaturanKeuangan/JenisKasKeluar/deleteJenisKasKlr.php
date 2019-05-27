<?php 
	@session_start();
	include "../../../../Config/configdb.php";
	include "../../../../Config/Functions.php";
	include	"../../../session.php";

		if(isset($_POST['delJnsKasKlr'])){
			$id 			= $_POST['id'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

			$deleteJnsKas = $db->query("DELETE FROM jenis_kas WHERE idJenis_kas = '$id' ") or die ($db->error);
			$deleteKas = $db->query("DELETE FROM kas WHERE idJenis_kas = '$id'") or die ($db->error);

			logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Jenis Kas Keluar');
		}
?>