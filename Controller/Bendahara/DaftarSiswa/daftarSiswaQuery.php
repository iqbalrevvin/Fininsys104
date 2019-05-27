<?php
$daftarSiswaQuery = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas
										JOIN prodi ON kelas.idJurusan = prodi.idJurusan
										ORDER BY idSiswa DESC") or die ($db->error);
?>