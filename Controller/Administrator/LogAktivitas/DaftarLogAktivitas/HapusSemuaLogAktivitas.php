<?php
@session_start();
	include"../../../../Config/ConfigDB.php";
	include "../../../../Config/Functions.php";
	include "../../../Session.php";

	if(isset($_POST['delLog'])){
		//lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = date("Y-m-d");
        $jamAct     = date("H:i:s");
        $tglJamAct  = date("Y-m-d H:i:s");
        //------------------------------------------

        $delLog = $db->query("TRUNCATE TABLE log_aktivitas") or die ($db->error);
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'HAPUS SEMUA DATA LOG AKTIVITAS / RESET DATA LOG AKTVITAS');
	}

?>