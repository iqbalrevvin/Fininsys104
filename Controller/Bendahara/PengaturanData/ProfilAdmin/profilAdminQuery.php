<?php
error_reporting(0);
@session_start();
include "Config/configdb.php";

if(@$_GET['ID'] == $_SESSION['Administrator'] || @$_GET['ID'] == $_SESSION['Bendahara'] || @$_GET['ID'] == $_SESSION['KepalaSekolah']){


if(@$_SESSION['Administrator']){
	$profilAdminQuery = $db->query("SELECT * FROM users JOIN admin ON users.no_idnt = admin.no_idnt 
									WHERE users.no_idnt = '$_SESSION[Administrator]' ") or die ($db->error);
}elseif (@$_SESSION['Bendahara']) {
	$profilAdminQuery = $db->query("SELECT * FROM users JOIN admin ON users.no_idnt = admin.no_idnt 
									WHERE users.no_idnt = '$_SESSION[Bendahara]' ") or die ($db->error);
}elseif (@$_SESSION['KepalaSekolah']) {
	$profilAdminQuery = $db->query("SELECT * FROM users JOIN admin ON users.no_idnt = admin.no_idnt 
									WHERE users.no_idnt = '$_SESSION[KepalaSekolah]' ") or die ($db->error);
}else{
	echo "error";
}
}else{
	$profilAdminQuery = $db->query("SELECT * FROM users JOIN admin ON users.no_idnt = admin.no_idnt 
									WHERE admin.no_idnt = '$_GET[ID]' ") or die ($db->error);
}

?>