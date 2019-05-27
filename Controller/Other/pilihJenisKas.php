<?php
	$dftKas = mysqli_query($db, "SELECT * FROM jenis_kas ORDER BY nama_jenis_kas") or die ($db->error);
	$dftKasMasuk = mysqli_query($db, "SELECT * FROM jenis_kas WHERE tipe_kas='MASUK' ORDER BY nama_jenis_kas") or die ($db->error);
	$dftKasKeluar = mysqli_query($db, "SELECT * FROM jenis_kas WHERE tipe_kas='KELUAR' ORDER BY nama_jenis_kas") or die ($db->error);
?>