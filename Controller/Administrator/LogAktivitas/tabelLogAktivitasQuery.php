<?php
	@session_start();
	date_default_timezone_set('Asia/Jakarta');
	include "../../../Config/configdb.php";
	include"../../../Controller/Session.php";
	$now = date('Y-m-d');
	$logAktivitasQr = $db->query("SELECT * FROM log_aktivitas WHERE tgl_aktivitas = '$now' ORDER BY idLog DESC") or die ($db->error);
?>