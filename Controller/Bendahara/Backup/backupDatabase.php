<?php
@session_start();
include "../../../Config/configdb.php";
include "../../../Config/Functions.php";
date_default_timezone_set('Asia/Jakarta');
set_time_limit(0);
ignore_user_abort(true);


require('MySQLDump.php');

$time = -microtime(true);

$dump = new MySQLDump(new mysqli('localhost', 'root', '', 'fininsys_smkikakartika'));
$dump->save('../../../DatabaseBackup/Fininsys-Database-Backup_' . date('d-m-Y') . '.sql.gz');

$time += microtime(true);
echo "FINISHED (in $time s)";
logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Backup Database'); 