<?php
    $ReportQuery = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON kelas.nama_kelas = siswa.kelas
    								JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
    								JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
                                    JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                    JOIN master_transaksi ON jenis_transaksi.idMaster_transaksi=master_transaksi.idMaster_transaksi 
                                    WHERE transaksi.idJenis_transaksi = '$jnsTransaksi' 
									AND tgl_transaksi BETWEEN '$FromDate' AND '$EndDate' ORDER BY tgl_transaksi ASC ") or die ($db->error);
    $namaJenis = mysqli_query($db, "SELECT nama_jenis_transaksi FROM jenis_transaksi 
    								WHERE idJenis_transaksi = '$jnsTransaksi' ") or die ($db->error);
    $jenis = mysqli_fetch_array($namaJenis);
?>