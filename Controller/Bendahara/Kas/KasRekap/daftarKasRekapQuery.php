<?php
	$dftKasQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas 
								ORDER BY tgl_kas, idKas, tgl_input ASC") or die ($db->error);
?>