<?php
$rwyTransQuery = mysqli_query($db, "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
									JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
									WHERE transaksi.no_idnt = '$profil[no_idnt]' 
									ORDER BY transaksi.idTransaksi DESC") or die($db->error);
?>