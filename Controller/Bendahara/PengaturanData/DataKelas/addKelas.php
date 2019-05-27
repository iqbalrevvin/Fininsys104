<?php
	@session_start();
	include "../../../../Config/ConfigDB.php";
	include "../../../../Config/Functions.php";
	include "../../../Session.php";

	if(isset($_POST['addClass'])){
		$idJurusan          = $_POST['idJurusan'];
        $namaKelas          = $_POST['namaKelas'];
        	//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------
    $cekName = $db->query("SELECT * FROM kelas WHERE nama_kelas = '$namaKelas'") or die($db->error);
    if($cekName->num_rows > 0){ ?>
		<script>
            swal("TAMBAH KELAS GAGAL!", "Kelas <?= $namaKelas ?> Sudah Ada!", "error");
        </script>
        <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Input Kelas'); 
    }else{
		$insertPS = $db->query("INSERT INTO kelas (idKelas, idJurusan, nama_kelas) 
								VALUES ('','$idJurusan', '$namaKelas')") or die($db->error);
		?>
		<script>
            swal("TAMBAH KELAS BERHASIL!", "Kelas Dengan Nama <?= $namaKelas ?> Berhasil Ditambakan!", "success");
        </script>
        <?php

		logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Kelas');
	}
}
?>