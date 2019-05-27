<?php
	@session_start();
	include"../../../../Controller/Session.php";
	$AkunPenggunaQr = $db->query("SELECT * FROM users WHERE no_idnt != '$session[no_idnt]' AND level BETWEEN '1' AND '3' ORDER BY idUsers DESC") or die ($db->error);
?>