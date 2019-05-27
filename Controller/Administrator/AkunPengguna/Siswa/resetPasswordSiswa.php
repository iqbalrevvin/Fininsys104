<?php
	include "../../../../../Server/configdb.php";
	if(isset($_POST['resetPassSiswa'])){
		$id 		= $_POST['id'];
		$pass       = $_POST['nipd'];

	$updatePassSiswa = $db->query("UPDATE users SET password = md5('$pass'), pass = '$pass', username = '$pass' WHERE no_idnt = '$id'") or die($db->query);
}
?>