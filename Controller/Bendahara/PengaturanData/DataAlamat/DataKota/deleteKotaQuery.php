<?php
	@session_start();
	include "../../../../../Config/ConfigDB.php";
	include "../../../../../Config/Functions.php";
	include "../../../../Session.php";

	if(isset($_POST['delDataKota'])){
        $id          = $_POST['id'];

        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$hapusKota = $db->query("DELETE FROM alamat_kota WHERE idKota = '$id' ") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Data Kota');
	}
?>
