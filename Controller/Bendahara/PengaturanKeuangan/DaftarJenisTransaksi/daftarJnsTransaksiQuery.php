<?php
	include "../../../../Config/configdb.php";
	$sql = "SELECT * FROM jenis_transaksi JOIN master_transaksi 
			ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
			JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
			WHERE master_transaksi.tahun_angkatan = '$tahun'
			AND prodi.singkatan_jurusan = '$prodi'
			ORDER BY master_transaksi.tahun_angkatan";
	$dftJnsTransQuery = $db->query($sql) or die ($db->error);

?>
