<?php
@session_start();
	include "../../../Config/configdb.php";
	include "../../../Config/Functions.php";
	include "../../../Controller/Session.php";
	if(isset($_POST['delPengguna'])){
		$id 	= $_POST['idAdmin'];
		//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------
		$deleteAdmin = $db->query("DELETE FROM admin WHERE no_idnt = '$id' ");
		$deleteAkun = $db->query("DELETE FROM users WHERE no_idnt = '$id' ");

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Data Pengguna');
}
?>