<?php
	$dftKelasQuery = $db->query("SELECT * FROM kelas JOIN prodi ON kelas.idJurusan = prodi.idJurusan ORDER BY nama_jurusan") or die ($db->error);
	//$prodi = mysqli_fetch_array($dftProgramStudiQuery);
?>