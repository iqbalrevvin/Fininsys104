<?php
$profilSiswaQuery = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas 
												JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
												WHERE siswa.idSiswa = '$ID' ORDER BY idSiswa DESC") or die ($db->error);
?>