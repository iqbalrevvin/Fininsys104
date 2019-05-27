<?php 
$ID = @$_GET['ID'];
require_once "Config/ConfigDB.php";
if(@$_GET['k']==''){
	include "daftarProvinsi.php";
}else{
	require_once "404.php";
}