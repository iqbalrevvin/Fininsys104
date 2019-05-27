<?php 
	@session_start();
	include "../../../../Config/ConfigDB.php";
	include "../../../../Config/Functions.php";
	include	"../../../Session.php";

		if(isset($_POST['editJnsKasKlr'])){
			$id 					= $_POST['id'];
			$namaJnsKasKlr          = $_POST['namaJnsKasKlr'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

			$updateJnsKasMsk = $db->query("UPDATE jenis_kas SET nama_jenis_kas = '$namaJnsKasKlr' WHERE idJenis_kas = '$id' ") or die ($db->error);

			logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Jenis Kas Keluar');

		}
?>