<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/code_notes
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/

// Load file koneksi.php
include "../../../server/configdb-pdo.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';
	
	// Load librari PHPExcel nya
	require_once '../../../assets/PHPExcel/PHPExcel.php';
	
	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('../../../admin/page/DaftarSiswa/DataImport/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO siswa VALUES(	:idSiswa,:no_idnt,:tgl_masuk,:prodi,:nama_siswa,:nisn,
													:nipd,:tempat_lahir,:tgl_lahir,:agama,:alamat,
													:desa,:kecamatan,:kabupaten,:provinsi,:no_telp,
													:email,:foto,:pip,:nama_ayah,:tahun_lahir_ayah,:pendidikan_ayah,
													:pekerjaan_ayah,:penghasilan_ayah,:nama_ibu,:tahun_lahir_ibu,
													:pendidikan_ibu,:pekerjaan_ibu,:penghasilan_ibu,:tgl_daftar )");
	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id 			= '';
		$nik 			= $row['A']; // 
		$tgl_masuk 		= $row['B']; // 
		$prodi 			= $row['C']; // 
		$nama 			= $row['D']; // 
		$nisn 			= $row['E']; // 
		$nipd 			= $row['F'];
		$tmp_lahir 		= $row['G'];
		$tgl_lahir 		= $row['H'];
		$agama 			= $row['I'];
		$alamat 		= $row['J'];
		$desa 			= $row['K'];
		$kecamatan 		= $row['L'];
		$kabupaten 		= $row['M'];
		$provinsi 		= $row['N'];
		$no_telp 		= $row['O'];
		$email 			= $row['P'];
		$foto 			= $row['Q'];
		$pip 			= $row['R'];
		$nama_ayah 		= $row['S'];
		$thn_lhr_ayah 	= $row['T'];
		$pnd_ayah 		= $row['U'];
		$pkj_ayah 		= $row['V'];
		$phsl_ayah 		= $row['W'];
		$nama_ibu 		= $row['X'];
		$thn_lhr_ibu 	= $row['Y'];
		$pnd_ibu 		= $row['Z'];
		$pkj_ibu 		= $row['AA'];
		$phsl_ibu 		= $row['AB'];
		$tgl_daftar		= $row['AC'];
		// Cek jika semua data tidak diisi
		if(empty($nik) && empty($tgl_masuk) && empty($prodi) && empty($nama) && empty($nisn))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
	
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Proses simpan ke Database
			$sql->bindParam(':idSiswa', $id);
			$sql->bindParam(':no_idnt', $nik);
			$sql->bindParam(':tgl_masuk', $tgl_masuk);
			$sql->bindParam(':prodi', $prodi);
			$sql->bindParam(':nama_siswa', $nama);
			$sql->bindParam(':nisn', $nisn);
			$sql->bindParam(':nipd', $nipd);
			$sql->bindParam(':tempat_lahir', $tmp_lahir);
			$sql->bindParam(':tgl_lahir', $tgl_lahir);
			$sql->bindParam(':agama', $agama);
			$sql->bindParam(':alamat', $alamat);
			$sql->bindParam(':desa', $desa);
			$sql->bindParam(':kecamatan', $kecamatan);
			$sql->bindParam(':kabupaten', $kabupaten);
			$sql->bindParam(':provinsi', $provinsi);
			$sql->bindParam(':no_telp', $no_telp);
			$sql->bindParam(':email', $email);
			$sql->bindParam(':foto', $foto);
			$sql->bindParam(':pip', $pip);
			$sql->bindParam(':nama_ayah', $nama_ayah);
			$sql->bindParam(':tahun_lahir_ayah', $thn_lhr_ayah);
			$sql->bindParam(':pendidikan_ayah', $pnd_ayah);
			$sql->bindParam(':pekerjaan_ayah', $pkj_ayah);
			$sql->bindParam(':penghasilan_ayah', $phsl_ayah);
			$sql->bindParam(':nama_ibu', $nama_ibu);
			$sql->bindParam(':tahun_lahir_ibu', $thn_lhr_ibu);
			$sql->bindParam(':pendidikan_ibu', $pnd_ibu);
			$sql->bindParam(':pekerjaan_ibu', $pkj_ibu);
			$sql->bindParam(':penghasilan_ibu', $phsl_ibu);
			$sql->bindParam(':tgl_daftar', $tgl_daftar);
			$sql->execute(); // Eksekusi query insert
		}
		$numrow++; // Tambah 1 setiap kali looping
	}
	
}
	header('location:../../../Fininsys?p=StudentList'); // Redirect ke halaman awal
?>
