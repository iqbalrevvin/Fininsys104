<?php
@session_start();
include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../session.php";
	if(isset($_POST['addJenisPembayaranKhususSiswa'])){
		$idSiswa      		= $_POST['idSiswa'];
        $idJenisTrans     	= $_POST['idJenisTrans'];
        $thnPembayaran      = $_POST['thnPembayaran'];

        //lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = date("Y-m-d");
        $jamAct     = date("H:i:s");
        $tglJamAct  = date("Y-m-d H:i:s");
        //------------------------------------------
    $insert = $db->query("INSERT INTO jenis_transaksi_khusus (idJenis_transaksi_khusus, no_idnt, idJenis_transaksi, tahun_pembayaran)
							VALUE ('','$idSiswa', '$idJenisTrans', '$thnPembayaran')") or die($db->error);
    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Data Pembayaran Khusus Siswa');

	}
?>