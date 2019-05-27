<?php
	require_once "../../../../../Config/configdb.php";
	$dataDesaQr = $db->query("SELECT * FROM alamat_desa ORDER BY idDesa") or die($db->error);
?>
