<?php
	require_once "../../../../../Config/ConfigDB.php";
	$dataKotaQr = $db->query("SELECT * FROM alamat_kota ORDER BY idKota") or die($db->error);
?>
