<?php
	if(isset($_POST['tampilJenisTransaksi'])){
		$sql = "SELECT * FROM master_transaksi JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
				WHERE master_transaksi.tahun_angkatan = '$tahun' 
				AND prodi.singkatan_jurusan = '$prodi'
				ORDER BY master_transaksi.tahun_angkatan ASC";
		$master_transaksi_qr = $db->query($sql) or die ($db->error);		
	}else{
		$sql = "SELECT * FROM master_transaksi JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
				ORDER BY tahun_angkatan";
		$master_transaksi_qr = $db->query($sql) or die ($db->error);	
	}


//$JnsTrns = mysqli_fetch_array($jenis_transaksi_qr);
//echo "$JnsTrns[nama_jenis_transaksi]";
?>