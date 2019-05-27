<?php
	$dataDesa = $db->query("SELECT * FROM alamat_desa ORDER BY idDesa") or die ($db->error);
?>