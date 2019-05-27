<?php
$jenis_transaksi_qr = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi
											ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
											JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
 											ORDER BY set_semester ASC") or die ($db->error);

$jenis_transaksi_qr_2 = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi
											ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
											JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
											WHERE master_transaksi.idJurusan = '$pilihSiswa->idJurusan'
											AND master_transaksi.tahun_angkatan = '$Angkatan'
 											ORDER BY nama_jenis_transaksi ASC") or die ($db->error);
//$JnsTrns = mysqli_fetch_array($jenis_transaksi_qr);
//echo "$JnsTrns[nama_jenis_transaksi]";
?>