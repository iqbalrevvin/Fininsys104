<?php
	$dftMasterTransQuery = mysqli_query($db, "SELECT * FROM master_transaksi JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan ORDER BY tahun_angkatan") or die ($db->error);
?>
