<?php
	@session_start();
	include "../../../../Config/ConfigDB.php";

	if(isset($_POST['addProgramStudi'])){
		$namaPS 		= $_POST['namaPS'];
		$singkatanPS 	= $_POST['singkatanPS'];
		$jmlSemester 	= $_POST['jmlSemester'];
		$insertPS = $db->query("INSERT INTO prodi (idJurusan, nama_jurusan, singkatan_jurusan, jumlah_semester) 
								VALUES ('','$namaPS', '$singkatanPS', $jmlSemester)") or die($db->error);
	}
?>