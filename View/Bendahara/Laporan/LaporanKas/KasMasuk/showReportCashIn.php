<?php 
	include"Controller/Bendahara/Laporan/LaporanKas/KasMasuk/reportCashInQuery.php";
	include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";

	if(@$_POST['JnsKasMasuk'] == 'semua'){
 		$totalKasMasuk=$db->query("select SUM(jml_kas_masuk) AS jumlah FROM kas WHERE tgl_kas 
 									BETWEEN '$FromDate' AND '$EndDate' AND tipe_kas='MASUK' ");
 	}else{
 		$totalKasMasuk=$db->query("select SUM(jml_kas_masuk) AS jumlah FROM kas WHERE tgl_kas 
 									BETWEEN '$FromDate' AND '$EndDate' AND idJenis_kas = '$JenisKas' AND tipe_kas='MASUK' ");
 	}
    $total= $totalKasMasuk->fetch_object();
    $jam = date('H:i:s');
?>
<div class="header">
	<h2 style="text-align: center;">
        <button id="cetak" class="btn bg-red waves-effect">
            <i class="material-icons">print</i>
            <span>Cetak</span>
    	</button>
    	<a href="View/Bendahara/Laporan/LaporanKas/KasMasuk/exportReportCashIn.php?FD=<?php echo $FromDate ?>&ED=<?php echo $EndDate ?>&JNS=<?php echo $JenisKas ?>">
    	<button id="" class="btn bg-teal waves-effect">
            <i class="material-icons">grid_on</i>
            <span>Excel</span>
    	</button>
    	</a>
    </h2>
</div>

<div id="invoice">
	<h4 style="text-align: center;">
		<span class="font-bold font-14">LAPORAN TRANSAKSI KAS MASUK</span><br>
		<span class="font-13">SISTEM INFORMASI KEUANGAN <?= $sekolah['nama_sekolah'] ?></span>
	</h4>
	<table style="height: 0px; margin-left: 0; margin-right: auto; width: 400px;">
		<tbody class="font-12">
			<tr>
				<td>Nama Sekolah</td>
				<td>:</td>
				<td><?= $sekolah['nama_sekolah'] ?></td>
			</tr>
			<tr>
				<td>Periode Tanggal</td>
				<td>:</td>
				<td><?= tgl_indo($FromDate) ?> s/d <?= tgl_indo($EndDate) ?></td>
			</tr>
			<tr>
				<td>Total Kas Masuk</td>
				<td>:</td>
				<td>Rp.<?= number_format($total->jumlah) ?>.-</td>
			</tr>
			<tr>
				<td>Jenis Kas Masuk</td>
				<td>:</td>
				<?php if(@$_POST['JnsKasMasuk'] == 'semua'){ ?>
					<td>Semua Jenis</td>
				<?php }else{ ?> 
					<td><?= $jenis['nama_jenis_kas'] ?></td>
				<?php } ?>
			</tr>
		</tbody>
	</table>
	<hr />
	
	<table class="table table-bordered table-striped table-hover" 
		style="width: 1000px; height: 53px; margin-left: auto; margin-right: auto;" border="2">
		<thead style="background-color: #607D8B;">
			<tr style="height: 13px;">
				<th style="width: 0px; text-align: center; height: 13px;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px;">Kode Kas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Jenis Kas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Deskripsi</th>
				<th style="width: 1px; text-align: center; height: 13px;">Petugas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Tanggal</th>
				<th style="width: 0px; text-align: center; height: 13px;">Debit</th>
			</tr>
		</thead>
		<tfoot>
			<tr style="height: 13.9375px;">
				<th style="width: 0px; text-align: center; height: 13px;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px;">Kode Kas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Jenis Kas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Deskripsi</th>
				<th style="width: 0px; text-align: center; height: 13px;">Petugas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Tanggal</th>
				<th style="width: 0px; text-align: center; height: 13px;">Debit</th>
			</tr>
		</tfoot>
		<tbody>
				<?php
				$no = 1;
				while($report=$reportCashInQuery->fetch_object()):
				?>
			<tr style="height: 10px;">
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= sprintf('%05d', $no++) ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<strong><?= $report->no_kas ?></strong>
				</td>
				<td style="width: 0px; height: 10px; text-align: left; vertical-align: middle;">
					<?= $report->nama_jenis_kas ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: left; vertical-align: middle;">
					<?= $report->deskripsi ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= $report->petugas ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= ubahTgl($report->tgl_kas) ?>
				</td>
				<td style="width:0px; height: 10px; text-align: center; vertical-align: middle;">
					<b>Rp.<?= number_format($report->jml_kas_masuk) ?>.-</b>
				</td>
			</tr>
			<?php endwhile; ?>
		</tbody>
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
				Di Cetak Pada Tanggal : <?= tgl_indo($today) ?> - <?= $jam  ?>
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




