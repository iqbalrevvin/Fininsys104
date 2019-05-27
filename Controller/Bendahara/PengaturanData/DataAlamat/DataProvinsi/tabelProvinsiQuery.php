<?php
	require_once "../../../../../Config/configdb.php";
	$dataProvinsiQr = $db->query("SELECT * FROM alamat_provinsi ORDER BY idProvinsi") or die($db->error);
?>
