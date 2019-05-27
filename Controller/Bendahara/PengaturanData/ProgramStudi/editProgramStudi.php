<?php 
	@session_start();
	include "../../../../Config/ConfigDB.php";

		if(isset($_POST['editPS'])){
			$id 			= $_POST['id'];
			$namaPS			= $_POST['namaPS'];
			$singkatanPS 	= $_POST['singkatanPS'];
			$jmlSemester 	= $_POST['jmlSemester'];

			$updatePS = $db->query(" UPDATE prodi SET nama_jurusan = '$namaPS', singkatan_jurusan = '$singkatanPS', 
													  jumlah_semester = '$jmlSemester'
										WHERE idJurusan = '$id' ") or die ($db->error);

		}
?>