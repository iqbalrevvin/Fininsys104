<?php
	$daftar_siswa_qr = mysqli_query($db, "SELECT idSiswa, nama_siswa, no_idnt, kelas, nipd FROM siswa ORDER BY nama_siswa") or die ($db->error);
	//$daftar_siswa = mysqli_fetch_array($daftar_siswa_qr);
	//echo "$daftar_siswa[nama_siswa]";
?>