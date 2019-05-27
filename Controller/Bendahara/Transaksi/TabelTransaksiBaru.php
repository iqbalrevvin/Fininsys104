<?php
include "../../../Config/ConfigDB.php";
date_default_timezone_set('Asia/Jakarta');
$today = date("Y-m-d"); 
$qr_trans_baru = mysqli_query($db, "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
									JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
									JOIN master_transaksi ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
									JOIN kelas ON siswa.kelas = kelas.nama_kelas JOIN prodi ON prodi.idJurusan = kelas.idJurusan
									WHERE transaksi.tgl_transaksi = '$today' ORDER BY transaksi.idTransaksi DESC") or die($db->error);



/*
echo $transaksi_baru['idSiswa'];
echo $transaksi_baru['idJenis_transaksi'];
echo $transaksi_baru['jumlah_bayar'];
echo $transaksi_baru['nama_jenis_transaksi'];
*/
?>