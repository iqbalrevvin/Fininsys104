<?php 
$ID = @$_GET['ID'];
require_once "Config/ConfigDB.php";
if(@$_GET['k']==''){
	include "daftarKecamatan.php";
}else{
	require_once "404.php";
}