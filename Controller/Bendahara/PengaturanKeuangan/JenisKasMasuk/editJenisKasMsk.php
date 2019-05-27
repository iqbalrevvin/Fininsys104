<?php 
	@session_start();
	include "../../../../Config/configdb.php";
	include "../../../../Config/Functions.php";
	include	"../../../session.php";

		if(isset($_POST['editJnsKasMsk'])){
			$id 					= $_POST['id'];
			$namaJnsKasMsk          = $_POST['namaJnsKasMsk'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

			$updateJnsKasMsk = $db->query("UPDATE jenis_kas SET nama_jenis_kas = '$namaJnsKasMsk' WHERE idJenis_kas = '$id' ") or die ($db->error);

			logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Jenis Kas Masuk');

		}
?>