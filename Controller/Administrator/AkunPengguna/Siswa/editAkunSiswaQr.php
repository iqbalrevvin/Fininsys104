<?php
@session_start();
include "../../../../../Server/configdb.php";
include "../../../../../Server/Functions.php";
include "../../../../query/session.php";
if(isset($_POST['editAkunSiswa'])){
	$id                  = $_POST['id'];
    $namaTampilan        = $_POST['namaTampilan'];
    $username            = $_POST['username'];
    $status				 = $_POST['status'];
    $online 			 = $_POST['online'];
    $editAkunPengguna = $db->query("UPDATE users SET 
                                    nama_tampilan='$namaTampilan',
                                    username='$username',
                                    status='$status',
                                    online='$online' WHERE no_idnt = '$id'") or die($db->error);
}

?>