<?php
@session_start();
include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../session.php";
	if(isset($_POST['delJenisTransaksiKhusus'])){
		$id     = $_POST['id'];

        //lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = date("Y-m-d");
        $jamAct     = date("H:i:s");
        $tglJamAct  = date("Y-m-d H:i:s");
        //------------------------------------------
    $insert = $db->query("DELETE FROM jenis_transaksi_khusus WHERE idJenis_transaksi_khusus = '$id' ") or die($db->error);
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Hapus Data Pembayaran Khusus Siswa');

	}
?>