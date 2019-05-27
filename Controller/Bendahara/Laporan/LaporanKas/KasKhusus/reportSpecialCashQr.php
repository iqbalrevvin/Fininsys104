<?php
    $reportCashSpecialQr = $db->query("SELECT * FROM kas_khusus JOIN jenis_kas ON kas_khusus.idJenis_kas = jenis_kas.idJenis_kas
    								  JOIN master_kas_khusus ON kas_khusus.idMaster_kas = master_kas_khusus.idMaster_kas
                                    WHERE kas_khusus.tgl_kas BETWEEN '$FromDate' AND '$EndDate' 
                                    AND kas_khusus.idMaster_kas = '$masterKas'
                                    ORDER BY tgl_kas, idKas_khusus, tgl_input ASC") or die ($db->error);
    $namaMasterQr = $db->query("SELECT * FROM master_kas_khusus WHERE idMaster_kas= '$masterKas'") or die ($db->error);
    $idntMaster 	= $namaMasterQr->fetch_object();
    $namaMaster 	= $idntMaster->nama_master_kas;
    $tahunMaster 	= $idntMaster->tahun_master_kas;
?>