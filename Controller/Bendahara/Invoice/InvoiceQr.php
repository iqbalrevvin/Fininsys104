<?php
$cetakTransaksiQuery = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas
									JOIN prodi ON kelas.idJurusan = prodi.idJurusan
									JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
									JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
									JOIN master_transaksi ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
									WHERE transaksi.no_transaksi = '$inv' ORDER BY transaksi.idTransaksi DESC") or die($db->error);
?>