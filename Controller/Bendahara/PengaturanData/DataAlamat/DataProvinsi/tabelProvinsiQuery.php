<?php
	require_once "../../../../../Config/ConfigDB.php";
	$dataProvinsiQr = $db->query("SELECT * FROM alamat_provinsi ORDER BY idProvinsi") or die($db->error);
?>
