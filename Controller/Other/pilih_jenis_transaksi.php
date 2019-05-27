<?php
$jenis_transaksi_qr = mysqli_query($db, "SELECT * FROM jenis_transaksi JOIN master_transaksi
											ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
											JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
 											ORDER BY set_semester ASC") or die ($db->error);
//$JnsTrns = mysqli_fetch_array($jenis_transaksi_qr);
//echo "$JnsTrns[nama_jenis_transaksi]";
?>