<?php
if(!empty($_FILES)){
	$targetDir = "../../../Assets/images/pas-foto-siswa/";
	$namaFile = $_FILES['file']['name'];
	$targetFile = $targetDir.$namaFile;
	move_uploaded_file($_FILES['file']['tmp_name'],$targetFile);
}
?>