<?php
$mac = $_SERVER['HTTP_USER_AGENT'];
//INSERT LOOG AKTIVITAS--------------------------------------------------------------------------------------------------------
function logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskirpLog){
    include"../../Config/ConfigDB.php"; 
$insertLog = $db->query("INSERT INTO log_aktivitas( idLog, 
                                                    idUsers, 
                                                    level, 
                                                    nama_tampilan, 
                                                    tgl_aktivitas, 
                                                    jam_aktivitas, 
                                                    tgl_jam_aktivitas, 
                                                    mac_address, 
                                                    deskripsi_log )
                                            VALUES('',
                                                    '$idUsers', 
                                                    '$level', 
                                                    '$namaTmpln', 
                                                    '$tglAct', 
                                                    '$jamAct', 
                                                    '$tglJamAct', 
                                                    '$mac', 
                                                    '$deskirpLog')");
return $insertLog;
}
?>