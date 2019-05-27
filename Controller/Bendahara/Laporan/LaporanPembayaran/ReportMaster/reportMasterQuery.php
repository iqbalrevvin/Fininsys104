<?php
    $ReportQuery = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON kelas.nama_kelas = siswa.kelas
    								JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
    								JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
                                    JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                    JOIN master_transaksi ON jenis_transaksi.idMaster_transaksi=master_transaksi.idMaster_transaksi 
                                    WHERE jenis_transaksi.idMaster_transaksi = '$masterTransaksi' 
									AND tgl_transaksi BETWEEN '$FromDate' AND '$EndDate' ORDER BY tgl_transaksi ASC ") or die ($db->error);
    $namaMaster = mysqli_query($db, "SELECT * FROM master_transaksi WHERE idMaster_transaksi = '$masterTransaksi' ") or die ($db->error);
    $master = mysqli_fetch_array($namaMaster);
?>