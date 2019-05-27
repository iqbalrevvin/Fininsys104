<?php
	@session_start();
	include "../../../../Config/configdb.php";
	include "../../../../Config/Functions.php";
	include "../../../session.php";

	if(isset($_POST['addMtrKasKhusus'])){
		$namaMasterKasKhusus         	= $_POST['namaMasterKasKhusus'];
		$tahun 							= $_POST['thnMstrKas'];

			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$insertKhusuMsk = $db->query("INSERT INTO master_kas_khusus (idMaster_kas, nama_master_kas, tahun_master_kas) 
								VALUES ('','$namaMasterKasKhusus','$tahun')") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Master Kas Khusus');
	}
?>