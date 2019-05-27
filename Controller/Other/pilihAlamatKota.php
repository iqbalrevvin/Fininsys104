<?php
	$dataKota = $db->query("SELECT * FROM alamat_kota ORDER BY idKota") or die ($db->error);
?>