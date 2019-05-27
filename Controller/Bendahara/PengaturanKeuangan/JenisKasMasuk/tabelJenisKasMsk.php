<?php
	$dftJnsKasMskQr = $db->query("SELECT * FROM jenis_kas WHERE tipe_kas='MASUK' ORDER BY idJenis_kas") or die ($db->error);
?>