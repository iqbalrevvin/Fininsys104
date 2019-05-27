<?php
	@session_start();
	include "../../../../Config/configdb.php";
	include "../../../../Config/Functions.php";
	include	"../../../session.php";
	if(isset($_POST['addJnsKasKlr'])){
		$namaJnsKasKlr          = $_POST['namaJnsKasKlr'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$insertJnsKasKlr = $db->query("INSERT INTO jenis_kas (idJenis_kas, nama_jenis_kas, tipe_kas) 
								VALUES ('','$namaJnsKasKlr', 'KELUAR')") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'input Jenis Kas Keluar');
	}
?>