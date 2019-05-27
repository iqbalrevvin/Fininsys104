<?php
$daftarKelas = mysqli_query($db, "SELECT * FROM kelas JOIN prodi ON kelas.idJurusan = prodi.idJurusan ORDER BY idKelas ASC") or die ($db->error);
?>