<?php 
$ID = @$_GET['ID'];
require_once "Config/configdb.php";
if(@$_GET['k']==''){
	include "daftarKota.php";
}else{
	require_once "404.php";
}