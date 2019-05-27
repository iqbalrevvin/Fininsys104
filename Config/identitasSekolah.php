<?php
	function alamatSekolah(){
		require"./Config/ConfigDB.php";
		$sql = "SELECT * FROM sekolah";
		$execution = $db->query($sql);
		$alamatSekolah = $execution->fetch_object();
		$alamat = $alamatSekolah->alamat_sekolah;
		$desa = $alamatSekolah->desa_sekolah;
		$kecamatan = $alamatSekolah->kecamatan_sekolah;
		$kabupaten = $alamatSekolah->kabupaten_sekolah;
		$provinsi = $alamatSekolah->provinsi_sekolah;
		$kodePos = $alamatSekolah->kode_pos;
		$alamatLogin = "".$alamat." Kec. ".$kecamatan." Kab. ".$kabupaten." Prov. ".$provinsi." ".$kodePos." ";
		return $alamatLogin;
	}

	function namaSekolah(){
		require"./Config/ConfigDB.php";
		$sql = "SELECT nama_sekolah FROM sekolah";
		$execution = $db->query($sql);
		$nama = $execution->fetch_object();
		$namaSekolah = $nama->nama_sekolah;

		return $namaSekolah;
	}
?>