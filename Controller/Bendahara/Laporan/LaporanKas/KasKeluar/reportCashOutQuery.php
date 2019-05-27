<?php
	if(@$_POST['JnsKasKeluar'] == 'semua'){
    $reportCashOutQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
                                    WHERE kas.tgl_kas BETWEEN '$FromDate' AND '$EndDate' AND kas.tipe_kas = 'KELUAR'
                                    ORDER BY kas.tgl_kas ASC") or die ($db->error);
	}else{
		$reportCashOutQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
                                    WHERE kas.tgl_kas BETWEEN '$FromDate' AND '$EndDate' AND kas.tipe_kas = 'KELUAR' 
                                    AND kas.idJenis_kas = '$JenisKas' ORDER BY kas.tgl_kas ASC") or die ($db->error);
	}
    $namaJenis = mysqli_query($db, "SELECT nama_jenis_kas FROM jenis_kas 
    								WHERE idJenis_kas = '$JenisKas'") or die ($db->error);
    $jenis = mysqli_fetch_array($namaJenis);
?>