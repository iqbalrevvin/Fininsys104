<?php
@session_start();
	include"../../../Config/configdb.php";
	include "../../../Config/Functions.php";
	include "../../session.php";
	/*if(isset($_POST['delSiswa'])){
		$id 	= $_POST['idSiswa'];
		$fotoQ 	= mysqli_query($db, "SELECT foto FROM siswa WHERE no_idnt = '$id' ");
		$foto 	= mysqli_fetch_array($fotoQ);
		$folder = "../../../assets/images/pas-foto-siswa/$foto[foto]";
		unlink($folder);
			//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

	mysqli_query($db,"DELETE FROM siswa WHERE no_idnt = '$id'");
	mysqli_query($db,"DELETE FROM transaksi WHERE no_idnt = '$id'");

	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Data Siswa');
}
*/
//lOG Aktivitas ---------------
$idUsers    = $session['idUsers'];
$level      = $session['level'];
$namaTmpln  = $session['nama_tampilan'];
$tglAct     = date("Y-m-d");
$jamAct     = date("H:i:s");
$tglJamAct  = date("Y-m-d H:i:s");
//------------------------------------------
$data_ids = $_REQUEST['data_ids'];
$data_id_array = explode(",", $data_ids); 
if(!empty($data_id_array)) {
	foreach($data_id_array as $id) {
		$delete = $db->query("DELETE FROM siswa WHERE no_idnt = '$id'");
		$fotoQ 	= mysqli_query($db, "SELECT foto FROM siswa WHERE no_idnt = '$id' ");
		$foto 	= mysqli_fetch_array($fotoQ);
		$folder = "../../../assets/images/pas-foto-siswa/$foto[foto]";
		unlink($folder);
	}
logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Data Siswa');
}
?>