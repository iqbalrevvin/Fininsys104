<?php
$daftarJurusan = mysqli_query($db, "SELECT * FROM prodi ORDER BY idJurusan ASC") or die ($db->error);
//$JnsTrns = mysqli_fetch_array($jenis_transaksi_qr);
//echo "$JnsTrns[nama_jenis_transaksi]";
?>