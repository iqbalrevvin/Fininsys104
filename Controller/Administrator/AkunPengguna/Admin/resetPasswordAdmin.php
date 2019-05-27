<?php
@session_start();
	include "../../../../Config/configdb.php";
	include "../../../../Config/Functions.php";
	if(isset($_POST['resetPassAdmin'])){
		$id 		= $_POST['id'];
		$pass       = $_POST['nip'];

	$updatePassSiswa = $db->query("UPDATE users SET password = md5('$pass'), pass = '$pass', username = '$pass', online='off' WHERE no_idnt = '$id'") or die($db->query);

}
?>