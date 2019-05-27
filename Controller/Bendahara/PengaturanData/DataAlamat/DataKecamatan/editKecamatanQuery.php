<?php
	@session_start();
	include "../../../../../Config/configdb.php";
	include "../../../../../Config/Functions.php";
	include "../../../../session.php";

	if(isset($_POST['editDataKecamatan'])){
		$id 						= $_POST['id'];
        $namaKecamatan          	= $_POST['namaKecamatan'];

        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$editDesa = $db->query("UPDATE alamat_Kecamatan SET nama_Kecamatan = '$namaKecamatan' WHERE idKecamatan='$id'") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Data Kecamatan');
	}
?>
