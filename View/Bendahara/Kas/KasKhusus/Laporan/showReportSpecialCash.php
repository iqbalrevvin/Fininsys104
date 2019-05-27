<?php 
	include"admin/query/KasKhusus/Laporan/reportSpecialCashQr.php";
	include "admin/query/PengaturanData/DataSekolah/profilSekolahQuery.php";

	//IDENTIFIKASI KAS MASUK
	$totalKasMasuk=$db->query("select SUM(jml_kas_masuk) AS total FROM kas_khusus WHERE tgl_kas BETWEEN '$FromDate' AND '$EndDate' AND tipe_kas='MASUK' AND idMaster_kas = '$masterKas'");
    $jmlKasMsk= $totalKasMasuk->fetch_object();
    //-------------------------------------------------------------------------------------------------------------------------------
    //IDENTIFIKASI KAS KELUAR
 	$totalKasKeluar=$db->query("select SUM(jml_kas_keluar) AS total FROM kas_khusus WHERE tgl_kas BETWEEN '$FromDate' AND '$EndDate' AND tipe_kas='KELUAR' AND idMaster_kas = '$masterKas' ");
    $jmlKasKlr= $totalKasKeluar->fetch_object();
    //-------------------------------------------------------------------------------------------------------------------------------
    $saldo = $jmlKasMsk->total - $jmlKasKlr->total;
    $jam = date('H:i:s');
?>
<div class="header">
	<h2 style="text-align: center;">
        <button id="cetak" class="btn bg-red waves-effect">
            <i class="material-icons">print</i>
            <span>Cetak</span>
    	</button>
    	<a href="admin/page/KasKhusus/Laporan/exportReportCashSpecial.php?Master=<?php echo $masterKas ?>&FD=<?php echo $FromDate ?>&ED=<?php echo $EndDate ?>">
    	<button id="" class="btn bg-teal waves-effect">
            <i class="material-icons">grid_on</i>
            <span>Excel</span>
    	</button>
    	</a>
    </h2>
</div>

<div id="invoice">
	<h4 style="text-align: center;">
		<span class="font-bold font-14">LAPORAN KAS KHUSUS <?= $namaMaster ?> <?= $tahunMaster ?></span><br>
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
		</tbody>
	</table>
	<hr />
	
	<table class="table table-bordered table-striped table-hover" 
		style="width: 1200; height: 53px; margin-left: auto; margin-right: auto;" border="2">
		<thead style="background-color: #607D8B;">
			<tr style="height: 13px;">
				<th style="width: 0px; text-align: center; height: 13px;">No.</th>
				<th style="width: 0px; text-align: center; height: 13px;">Kode Kas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Jenis Kas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Deskripsi</th>
				<th style="width: 0px; text-align: center; height: 13px;">Petugas</th>
				<th style="width: 0px; text-align: center; height: 13px;">Tanggal</th>
				<th style="width: 0px; text-align: center; height: 13px;">Debit</th>
				<th style="width: 0px; text-align: center; height: 13px;">Kredit</th>
				<th style="width: 0px; text-align: center; height: 13px;">Saldo</th>
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
				<th style="width: 0px; text-align: center; height: 13px;">Kredit</th>
				<th style="width: 0px; text-align: center; height: 13px;">Saldo</th>
			</tr>
		</tfoot>
		<tbody>
				<?php
				$no = 1;
				while($report=$reportCashSpecialQr->fetch_object()):
					error_reporting(0);
                    $debit  = $report->jml_kas_masuk;
                    $kredit = $report->jml_kas_keluar;
                    $saldoRunning  += $debit - $kredit;
                    $saldoRun = $saldoRunning;
				?>
			<tr style="height: 10px;">
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<?= sprintf('%05d', $no++) ?>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<strong><?= $report->no_kas ?></strong>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
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
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<b class="col-teal">
						Rp.<?= number_format($debit) ?>.-
					</b>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<b class="col-red">Rp.<?= number_format($kredit) ?>.-</b>
				</td>
				<td style="width: 0px; height: 10px; text-align: center; vertical-align: middle;">
					<b class="col-black">Rp.<?= number_format($saldoRun) ?>.-</b>
				</td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
<table style="height: 90px; margin-left: auto; margin-right: auto; width: 1200px;" border="0">
	<tbody class="font-12">
		<tr style="height: 7px;">
			<td style="width: 260px; height: 7px;">Total Kas Masuk</td>
			<td style="width: 10px; height: 7px;">:</td>
			<td style="width: 571px; height: 7px;">Rp.<?= number_format($jmlKasMsk->total) ?>.-</td>
			<td style="width: 302px; height: 50px;" rowspan="4">
				<p><span class="font-12">
					Tanggulun, <?php echo tgl_indo($today) ?><br> Petugas</span>
				</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>

					<p class="font-13">
						<b>
							<span style="text-decoration: underline;"> <?php echo $session['nama_tampilan'] ?></span>
						</b>
					</p>
			</td>
		</tr>
		<tr style="height: 7px;">
			<td style="width: 260px; height: 7px;">Total Kas Keluar</td>
			<td style="width: 10px; height: 7px;">:</td>
			<td style="width: 571px; height: 7px;">Rp.<?= number_format($jmlKasKlr->total) ?>.-</td>
		</tr>
		<tr style="height: 7px;">
			<td style="width: 260px; height: 7px;">Saldo Saat Ini</td>
			<td style="width: 10px; height: 7px;">:</td>
			<td style="width: 571px; height: 7px;"><b>Rp.<?= number_format($saldo) ?>.-</b></td>
		</tr>
		<tr style="height: 7px;">
			<td style="width: 260px; height: 7px;"><p>&nbsp;</p></td>
			<td style="width: 10px; height: 7px;"><p>&nbsp;</p></td>
			<td style="width: 571px; height: 7px;"><p>&nbsp;</p></td>
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
		<em> SI-Pembayaran SMK IKA KARTIKA </em>||
		<em>&nbsp;WebMaster : M. Iqbal</em></span></p>
	
</div>
</div>




