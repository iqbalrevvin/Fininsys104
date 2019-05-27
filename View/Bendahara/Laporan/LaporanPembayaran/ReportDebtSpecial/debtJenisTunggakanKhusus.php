<h4 style="text-align: center;">
		<span style="text-decoration: ;">LAPORAN TUNGGAKAN PESERTA DIDIK</span>
	</h4>
	<h6 style="text-align: center;">
		<span>
			Jenis Tunggakan : "<?= $tunggakanKhusus->namaTunggakan($jnsTunggakan) ?>" | Tahun Angkatan : "<?= $thnAngkatan ?>" | Kelas : "<?= $kelas ?>"
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
				require('Controller/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/tabelTunggakanKhusus.php');
				$datatunggakanKhusus = tabelTunggakanKhusus($thnAngkatan, $kelas);
				$no = 1;
				while($data = $datatunggakanKhusus->fetch_object()):
					$semester = semester($data->tgl_masuk, $data->jumlah_semester);
					$idnt = $data->no_idnt;
				?>
			<tr style="height: 10px;">
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $no++ ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: left; vertical-align: middle;">
					<?= $data->nama_siswa ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $data->kelas ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $semester ?>
				</td>
					
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					Rp.<?= number_format(jumlahPembayaran($idnt, $jnsTunggakan)) ?>.-
				</td>
					
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					Rp.<?= number_format(jumlahKewajiban($idnt, $jnsTunggakan)) ?>.-
				</td>
				
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php
						$jmlPembayaran = jumlahPembayaran($idnt, $jnsTunggakan);
						$jmlKewajiban = jumlahKewajiban($idnt, $jnsTunggakan);
					?>
					<?= jumlahTunggakanKhusus($jmlPembayaran, $jmlKewajiban) ?>
					<?php $jumlahTunggakanKhusus[] = $jmlKewajiban-$jmlPembayaran; ?>
				</td>
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr style="height: 13px;">
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;" colspan="5">
					<?php $jmlSeluruhTunggakan = array_sum($jumlahTunggakanKhusus); ?>
					Jumlah Semua Tunggakan <?= $tunggakanKhusus->namaTunggakan($jnsTunggakan) ?> : <b>Rp.<?= number_format($jmlSeluruhTunggakan) ?>.-</b>
				</th>
				<th style="width: 0px; text-align: center; height: 13px; vertical-align: middle;">
				</th>
			</tr>
		</tfoot>
	</table>
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