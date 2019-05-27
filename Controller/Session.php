<?php
	if(@$_SESSION['Administrator']){
		$session_aktif = mysqli_query($db, "SELECT * FROM users WHERE no_idnt = '$_SESSION[Administrator]' ") or die ($db->error);
	}elseif(@$_SESSION['KepalaSekolah']){
		$session_aktif = mysqli_query($db, "SELECT * FROM users WHERE no_idnt = '$_SESSION[KepalaSekolah]' ") or die ($db->error);
	}elseif(@$_SESSION['Bendahara']){
		$session_aktif = mysqli_query($db, "SELECT * FROM users WHERE no_idnt = '$_SESSION[Bendahara]' ") or die ($db->error);
	}
	$session = mysqli_fetch_array($session_aktif);
	//Deklarasi variabel perfiled
	$username = $session['username'];
	$idnt = $session['no_idnt'];
	$namaTampilan = $session['nama_tampilan'];
	$level = $session['level'];
	if($level == '1'){
		$namaLevel = 'Administrator';
	} elseif($level == '2') {
		$namaLevel = 'Kepala Sekolah';
	}elseif($level == '3') {
		$namaLevel = 'Bendahara';
	 }else {
		$namaLevel = 'Siswa';
	} 
	$jenisKelamin = $db->query("SELECT jenis_kelamin FROM admin WHERE no_idnt = '$session[no_idnt]' ") or die ($db->error);
	$jk = $jenisKelamin->fetch_object();
?>