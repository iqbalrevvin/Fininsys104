<?php
	@session_start();
	include "../../../../../Config/ConfigDB.php";
	include "../../../../../Config/Functions.php";
	include "../../../../Session.php";

	if(isset($_POST['addDataKecamatan'])){
        $namaKecamatan          = $_POST['namaKecamatan'];

        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

		$insertKecamatan = $db->query("INSERT INTO alamat_kecamatan (idKecamatan, nama_kecamatan) 
								VALUES ('','$namaKecamatan')") or die($db->error);

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Data Kecamatan');
	}
?>
