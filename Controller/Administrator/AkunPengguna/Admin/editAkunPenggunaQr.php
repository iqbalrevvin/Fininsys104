<?php
@session_start();
include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../../Controller/Session.php";
if(isset($_POST['editAkunPengguna'])){
	$id                  = $_POST['id'];
    $namaTampilan        = $_POST['namaTampilan'];
    $username            = $_POST['username'];
    $levelUser 				 = $_POST['level'];
    $status				 = $_POST['status'];
    $online 			 = $_POST['online'];

    //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------
    #$updateAkun = $db->query("UPDATE users SET nama_tampilan='$namaTampilan', username='$username', level='$level', status='$status', online='$online' WHERE no_idnt = '$nikAkun'") or die ($db->error);

    $editAkunPengguna = $db->query("UPDATE users SET 
                                    nama_tampilan='$namaTampilan',
                                    username='$username',
                                    level='$levelUser', 
                                    status='$status',
                                    online='$online' WHERE no_idnt = '$id'") or die($db->error);

    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Akun Pengguna');
}

?>