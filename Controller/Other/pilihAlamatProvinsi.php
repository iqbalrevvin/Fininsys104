<?php
	$dataProvinsi = $db->query("SELECT * FROM alamat_provinsi ORDER BY idProvinsi") or die ($db->error);
?>