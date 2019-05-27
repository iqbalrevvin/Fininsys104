<?php
	require_once "../../../../../Config/configdb.php";
	$dataKecamatanQr = $db->query("SELECT * FROM alamat_kecamatan ORDER BY idKecamatan") or die($db->error);
?>
