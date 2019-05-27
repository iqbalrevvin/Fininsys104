<?php
include "../../../../../Server/configdb.php";
$akunSiswaQr = $db->query("SELECT * FROM siswa ORDER BY idSiswa") or die($db->error);
?>
