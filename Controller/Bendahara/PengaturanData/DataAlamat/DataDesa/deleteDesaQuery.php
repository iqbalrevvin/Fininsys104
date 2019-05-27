<?php
	@session_start();
	include "../../../../../Config/configdb.php";
	include "../../../../../Config/Functions.php";
	include "../../../../session.php";

	if(isset($_POST['delDataDesa'])){
        $id          = $_POST['id'];

        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$hapusDesa = $db->query("DELETE FROM alamat_desa WHERE idDesa = '$id' ") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Data Desa');
	}
?>
