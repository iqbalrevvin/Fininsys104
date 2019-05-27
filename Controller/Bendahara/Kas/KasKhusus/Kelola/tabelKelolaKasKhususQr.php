<?php
	$tbKelolaKasKhususQr = $db->query("SELECT * FROM kas_khusus JOIN jenis_kas ON kas_khusus.idJenis_kas = jenis_kas.idJenis_kas
										JOIN master_kas_khusus ON kas_khusus.idMaster_kas = master_kas_khusus.idMaster_kas
										WHERE kas_khusus.idMaster_kas = '$ID' ORDER BY tgl_kas, idKas_khusus, tgl_input ASC") or die ($db->error);
?>