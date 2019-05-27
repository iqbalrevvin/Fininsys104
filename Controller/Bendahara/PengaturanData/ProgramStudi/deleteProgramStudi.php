<?php 
	@session_start();
	include "../../../../Config/ConfigDB.php";

		if(isset($_POST['delPS'])){
			$id 			= $_POST['id'];
			$deletePS = $db->query(" DELETE FROM prodi WHERE idJurusan = '$id' ") or die ($db->error);

		}
?>