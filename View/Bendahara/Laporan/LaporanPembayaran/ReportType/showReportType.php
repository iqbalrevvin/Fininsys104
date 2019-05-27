<?php 
	include "Controller/Bendahara/Laporan/LaporanPembayaran/ReportType/reportTypeQuery.php"; 
?>
<div class="header">
	<h2 style="text-align: center;">
        <button id="cetak" class="btn bg-red waves-effect">
            <i class="material-icons">print</i>
            <span>Cetak</span>
    	</button>
    	<a href="View/Bendahara/Laporan/LaporanPembayaran/ReportType/exportReportType.php?TT=<?= $jnsTransaksi ?>&FD=<?= $FromDate ?>&ED=<?= $EndDate ?>">
    	<button class="btn bg-teal waves-effect">
            <i class="material-icons">grid_on</i>
            <span>Excel</span>
    	</button>
    	</a>
    </h2>
</div>

<div id="invoice">
	<h4 style="text-align: center;">
		<span style="text-decoration: ;">LAPORAN TRANSAKSI PEMBAYARAN</span>
	</h4>
	<h6 style="text-align: center;">
		<span>
			Jenis Transaksi : "<?php echo $jenis['nama_jenis_transaksi'] ?>" | Periode :&nbsp;<u><?php echo tgl_indo($FromDate) ?></u> s/d <u><?php echo tgl_indo($EndDate) ?></u>"
		</span>&nbsp;
	</h6>
	<hr />
	
	<table class="table table-bordered table-striped table-hover font-12" 
		style="width: 1000px; height: 53px; margin-left: auto; margin-right: auto;" border="2">
		<thead style="background-color: #607D8B;">
			<tr style="height: 13px;">
				<th style="width: 0px; text-align: center; height: 13px;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px;">Nama</th>
				<th style="width: 0px; text-align: center; height: 13px;">Kelas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Smt</th>
				<th style="width: 0px; text-align: center; height: 13px;">No. Transaksi</th>
				<th style="width: 0px; text-align: center; height: 13px;">Jenis</th>
				<th style="width: 0px; text-align: center; height: 13px;">Tanggal</th>
				<th style="width: 0px; text-align: center; height: 13px;">Jumlah</th>
				<th style="width: 0px; text-align: center; height: 13px;">Keterangan</th>
			</tr>
		</thead>
		<tfoot>
			<tr style="height: 13.9375px;">
				<th style="width: 0px; text-align: center; height: 13px;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px;">Nama</th>
				<th style="width: 0px; text-align: center; height: 13px;">Kelas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Smt</th>
				<th style="width: 0px; text-align: center; height: 13px;">No. Transaksi</th>
				<th style="width: 0px; text-align: center; height: 13px;">Jenis</th>
				<th style="width: 0px; text-align: center; height: 13px;">Tanggal</th>
				<?php $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi WHERE
                                                          tgl_transaksi BETWEEN '$FromDate' AND '$EndDate'
                                                          AND idJenis_transaksi = '$jnsTransaksi' ");
                                    $jumlah=mysqli_fetch_array($total);
                 	?>
				<th style="width: 168px; text-align: center; height: 13px;">
					Rp. <?php echo number_format($jumlah['jumlah']) ?>.-
				</th>
				<th style="width: 0px; text-align: center; height: 13px;">Keterangan</th>
			</tr>
		</tfoot>
		<tbody>
				<?php
				$no = 1;
				while($Report = mysqli_fetch_array($ReportQuery)){ 
				?>
			<tr style="height: 10px;">
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php echo $no++ ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: left; vertical-align: middle;">
					<strong><?php echo $Report['nama_siswa'] ?></strong>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php echo $Report['kelas'] ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php echo semester($Report['tgl_masuk'], $Report['jumlah_semester']) ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php echo $Report['no_transaksi'] ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php echo $Report['nama_jenis_transaksi'] ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?php echo ubahTgl($Report['tgl_transaksi']) ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<b>Rp. <?php echo number_format($Report['jumlah_bayar']) ?>,-</b>
				</td>
				<td style="width: 0px; height: 10px; text-align: left; vertical-align: middle;">
					<?= $Report['ket_transaksi'] ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
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
</div>
</div>




