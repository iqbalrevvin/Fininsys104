<?php
    $reportCashOutQuery = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
                                    WHERE kas.tgl_kas BETWEEN '$FromDate' AND '$EndDate' 
                                    ORDER BY tgl_kas, idKas, tgl_input ASC") or die ($db->error);
?>