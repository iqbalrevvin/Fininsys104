<?php
	$now = date('m');
	$year = date('Y');
	$dftKasQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
								WHERE kas.tipe_kas = 'MASUK' AND month(tgl_kas) = '$now' AND year(tgl_kas) = '$year' ORDER BY kas.tgl_kas, tgl_input ASC") 
								or die ($db->error);
?>