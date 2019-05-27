<?php
$selectKasKhusus = $db->query("SELECT * FROM master_kas_khusus ORDER BY idMaster_kas") or die ($db->error);
?>