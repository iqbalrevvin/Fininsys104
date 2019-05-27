<?php
	$dataKecamatan = $db->query("SELECT * FROM alamat_kecamatan ORDER BY idKecamatan") or die ($db->error);
?>