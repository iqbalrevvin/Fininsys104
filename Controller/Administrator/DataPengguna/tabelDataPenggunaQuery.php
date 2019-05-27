<?php
	@session_start();
	#include "../../../../admin/query/session.php";
	$dataPenggunaQr = $db->query("SELECT * FROM admin WHERE no_idnt != '$session[no_idnt]' ORDER BY idAdmin DESC") or die ($db->error);
?>