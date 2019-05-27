<?php
@session_start();
include "../../Config/ConfigDB.php";
include "../../Config/Functions.php";
include "../../Controller/Session.php";
if(@$_SESSION['Bendahara']){
	$sessionON=$_SESSION['Bendahara'];
}elseif(@$_SESSION['KepalaSekolah']){
	$sessionON=$_SESSION['KepalaSekolah'];
}elseif(@$_SESSION['Administrator']){
	$sessionON=$_SESSION['Administrator'];
}
$idUsers    = $session['idUsers'];
$level      = $session['level'];
$namaTmpln  = $session['nama_tampilan'];
$tglAct     = date("Y-m-d");
$jamAct     = date("H:i:s");
$tglJamAct  = date("Y-m-d H:i:s");
$update_off = mysqli_query($db, "UPDATE users SET online='off' WHERE no_idnt='$sessionON'") or die ($db->error);
$sessionON = null;
logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Logout');
header("location:../../");
exit();
?>