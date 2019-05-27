<?php
	@session_start();
	include "../../../../../Config/configdb.php";
	include "../../../../../Config/Functions.php";
	include "../../../../session.php";

	if(isset($_POST['addDataProvinsi'])){
        $namaProvinsi          = $_POST['namaProvinsi'];

        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$insertKota = $db->query("INSERT INTO alamat_provinsi (idProvinsi, nama_provinsi) 
								VALUES ('','$namaProvinsi')") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Data Provinsi');
	}
?>
