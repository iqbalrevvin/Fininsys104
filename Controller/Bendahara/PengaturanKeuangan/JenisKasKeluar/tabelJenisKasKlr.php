<?php
	$dftJnsKasKlrQr = $db->query("SELECT * FROM jenis_kas WHERE tipe_kas='KELUAR' ORDER BY idJenis_kas") or die ($db->error);
?>