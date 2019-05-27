<?php 
	@session_start();
	include "../../../Config/configdb.php";
	include "../../../Config/Functions.php";
	include "../../session.php";
	if(isset($_POST['backup'])){
		#$nama_file = "fininsys_".date('d-m-Y').'.sql';
		$backup = backupDatabaseTables($dbhost,$dbuser,$dbpass,$dbname);
		//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------
		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Backup Database'); 
	}
?>