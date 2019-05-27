<?php
	function tabelTunggakanKhusus($thnAngkatan, $kelas){
		if(@$_GET['p'] == 'ReportDebtSpecial'){
			require"Config/configDB.php";
		}else{
			require"../../../../../Config/configDB.php";
		}
		$sql = "SELECT DISTINCT siswa.nama_siswa, siswa.no_idnt, siswa.kelas, siswa.tgl_masuk, prodi.jumlah_semester 
				FROM siswa JOIN jenis_transaksi_khusus ON siswa.no_idnt = jenis_transaksi_khusus.no_idnt 
				JOIN kelas ON siswa.kelas = kelas.nama_kelas JOIN prodi ON kelas.idJurusan = prodi.idJurusan
				WHERE year(siswa.tgl_masuk) = '$thnAngkatan' AND siswa.kelas = '$kelas'
				ORDER BY siswa.no_idnt ASC";
		$execution = $db->query($sql) or die ($db->error);
		return $execution;
	}

	function jumlahPembayaran($idnt, $jnsTunggakan){
		if(@$_GET['p'] == 'ReportDebtSpecial'){
			require"Config/configDB.php";
		}else{
			require"../../../../../Config/configDB.php";
		}
		if($jnsTunggakan == 'semuaTunggakan'){
			$sql = "SELECT sum(jumlah_bayar) AS jumlah FROM transaksi 
					JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
					WHERE transaksi.no_idnt = '$idnt' AND jenis_transaksi.tipe_jenis_transaksi = 'KHUSUS'";
		}else{
			$sql = "SELECT sum(jumlah_bayar) AS jumlah FROM transaksi 
					JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
					WHERE transaksi.no_idnt = '$idnt' AND transaksi.idJenis_transaksi = '$jnsTunggakan'";
		}
		$execution = $db->query($sql);
		$jumlahBayar = $execution->fetch_object();
		$jmlPembayaran = $jumlahBayar->jumlah;
		return $jmlPembayaran;
	}

	function jumlahKewajiban($idnt, $jnsTunggakan){
		if(@$_GET['p'] == 'ReportDebtSpecial'){
			require"Config/configDB.php";
		}else{
			require"../../../../../Config/configDB.php";
		}
		if($jnsTunggakan == 'semuaTunggakan'){
			$sql = "SELECT sum(kewajiban) AS jmlKewajiban FROM jenis_transaksi
				JOIN jenis_transaksi_khusus ON jenis_transaksi.idJenis_transaksi = jenis_transaksi_khusus.idJenis_transaksi 
				WHERE no_idnt = '$idnt'";
		}else{
			$sql = "SELECT sum(kewajiban) AS jmlKewajiban FROM jenis_transaksi
				JOIN jenis_transaksi_khusus ON jenis_transaksi.idJenis_transaksi = jenis_transaksi_khusus.idJenis_transaksi 
				WHERE jenis_transaksi_khusus.idJenis_transaksi = '$jnsTunggakan' AND no_idnt = '$idnt'";
		}
		$execution = $db->query($sql);
		$jumlahKewajiban = $execution->fetch_object();
		$jmlKewajiban = $jumlahKewajiban->jmlKewajiban;
		return $jmlKewajiban;
	}

	function jumlahTunggakanKhusus($jmlPembayaran, $jmlKewajiban){
		$tunggakan = $jmlKewajiban - $jmlPembayaran;
		if($tunggakan <= 0){ ?>
			<b class="font-bold col-teal">SELESAI</b>
		<?php }else{ ?>
			<b class="font-bold col-pink">Rp.<?= number_format($tunggakan) ?>,-</b>
		<?php }
		return;
	}
?>