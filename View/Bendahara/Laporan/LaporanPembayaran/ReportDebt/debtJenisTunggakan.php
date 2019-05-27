<?php 
	$jnsTransaksiQ = mysqli_query($db, "SELECT * FROM jenis_transaksi WHERE idJenis_transaksi = '$jnsTunggakan'") or die ($db->error);
	$tunggakan = mysqli_fetch_array($jnsTransaksiQ);
	$namaTunggakan = $tunggakan['nama_jenis_transaksi'];
?>
<h4 style="text-align: center;">
		<span style="text-decoration: ;">LAPORAN TUNGGAKAN PESERTA DIDIK</span>
	</h4>
	<h6 style="text-align: center;">
		<span>
			Jenis Tunggakan : "<?php echo $namaTunggakan ?>" | Tahun Angkatan : "<?php echo $thnAngkatan ?>" | Kelas : "<?php echo $kelas ?>"
		</span>&nbsp;
	</h6>
	<hr />
	
	<table class="table table-bordered table-striped table-hover" 
		style="width: 1000px; height: 53px; margin-left: auto; margin-right: auto;" border="2">
		<thead style="background-color: #607D8B;">
			<tr style="height: 13px;">
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">Nama</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">Kelas</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">Smt</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">Jumlah Pembayaran</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">Jumlah Kewajiban</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">Jumlah Tunggakan</th>
			</tr>
		</thead>
		<tbody>
				<?php
				$no = 1;
				while($dataSiswa = mysqli_fetch_array($ReportQuery)){
						$semester = semester($dataSiswa['tgl_masuk'], $dataSiswa['jumlah_semester']);
				?>
			<tr style="height: 10px;">
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $no++ ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: left; vertical-align: middle;">
					<strong><?= $dataSiswa['nama_siswa'] ?></strong>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $dataSiswa['kelas'] ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $semester ?>
				</td>
					<?php
					//Jumlah Yang Sudah Di Bayar
					if($dataSiswa['pindahan'] == 'YA'){
                        $dataPembayaran=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi JOIN jenis_transaksi 
                                                          ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                          WHERE set_semester between '1' AND '$semester' AND transaksi.no_idnt = '$dataSiswa[no_idnt]' AND transaksi.idJenis_transaksi = '$jnsTunggakan'");
                                    }else{
       					$dataPembayaran=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah FROM transaksi JOIN jenis_transaksi 
                                                          ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                          WHERE jenis_transaksi.set_semester between '1' AND '$semester' AND 
                                                          transaksi.no_idnt = '$dataSiswa[no_idnt]' AND transaksi.idJenis_transaksi = '$jnsTunggakan'");
       					}
                        $jumlah=mysqli_fetch_array($dataPembayaran);
                        $jumlahBayar = $jumlah['jumlah'];
                	?>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<b>Rp. <?php echo number_format($jumlahBayar) ?>,-</b>
				</td>
					<?php
                        //Kewajiban Yang Harus DI bayar
                        if($dataSiswa['pindahan'] == 'YA'){ 
                            $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn FROM jenis_transaksi 
                           									WHERE set_semester between '$dataSiswa[pindah_di_semester]' AND '$semester' AND idJenis_transaksi = '$jnsTunggakan'");
                        }else{
                            $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn FROM jenis_transaksi 
                            									WHERE set_semester between '1' and '$semester' AND idJenis_transaksi = '$jnsTunggakan'");
                        }
                        $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
                        //Kewajiban Yang Sudah Bayar
                        $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                    ?>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<b>Rp. <?php echo number_format($jmlKewajiban) ?>,-</b>
				</td>
				<?php $jumlahTunggakan = $jmlKewajiban - $jumlahBayar; ?>
				<?php $jumlahSemuaTunggakan[] = $jmlKewajiban - $jumlahBayar; ?>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
						<?php if($jumlahTunggakan <= 0){ ?>
					<b class="font-bold col-teal">SELESAI</b>
						<?php }else{ ?>
					<b class="font-bold col-pink">Rp. <?php echo number_format($jumlahTunggakan) ?>,-</b>
						<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr style="height: 13px;">
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;" colspan="5">
					<?php $jmlSeluruhTunggakan = array_sum($jumlahSemuaTunggakan); ?>
					Jumlah Semua Tunggakan <?= $namaTunggakan ?> : <b>Rp.<?= number_format($jmlSeluruhTunggakan) ?>.-</b>
				</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">
				</th>
			</tr>
		</tfoot>
	</table>
	<?php $Report = mysqli_fetch_array($ReportQuery) ?>
	<table style="height: 117px; margin-left: auto; margin-right: auto; width: 826px;">
		<tbody>
			<tr>
				<td style="width: 275px;">&nbsp;</td>
				<td style="width: 358px;">&nbsp;</td>

				<td style="width: 171px;"><p><span style="font-size: 10px;">
												Tanggulun, <?php echo tgl_indo($today) ?><br> Petugas</span>
										 </p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<h6><p><b><span style="text-decoration: underline;"> <?php echo $session['nama_tampilan'] ?></span></b></p></h6>
				</td>
			</tr>
		</tbody>
	</table>
	<p>
		<small>
			<span style="color: #808080; font-size: 10px;">
				Di Cetak Pada Tanggal : <?php echo tgl_indo($today) ?> - <?php echo $today ?>
			</span>
		</small>
	</p>
	<hr /><p><span style="color: #808080; font-size: 7px;">
		<em>All copyrights reserved &copy; 2018&nbsp; </em>||
		<!--<em> SI-Pembayaran SMK IKA KARTIKA </em>||
		<em>&nbsp;WebMaster : M. Iqbal</em></span></p>-->
		<em> Fininsys </em>