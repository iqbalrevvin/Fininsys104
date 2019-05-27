<?php
	$masterKasKhususQr = $db->query("SELECT * FROM master_kas_khusus ORDER BY idMaster_kas DESC") or die ($db->error);
?>