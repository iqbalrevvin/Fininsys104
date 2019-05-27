Config<?php
	@session_start();
	include "../../../../../Config/configdb.php";
	include "../../../../../Config/Functions.php";
	include "../../../../session.php";

	if(isset($_POST['editDataDesa'])){
		$id 				= $_POST['id'];
        $namaDesa          	= $_POST['namaDesa'];

        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$editDesa = $db->query("UPDATE alamat_desa SET nama_desa = '$namaDesa' WHERE idDesa='$id'") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Data Desa');
	}
?>
