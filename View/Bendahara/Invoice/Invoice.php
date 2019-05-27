<?php if(@$_GET['p'] != 'Transaction'){ 
	$scure= md5(md5($transaksi['no_transaksi']).md5('qwerty12345'));
?>
	<button id="cetak<?php echo $transaksi['idTransaksi'] ?>" class="btn bg-teal waves-effect">
	    <i class="material-icons">print</i>
	    <span>Cetak</span>
	</button>
<?php }else{ ?>
	<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     	<button class="btn bg-blue-grey waves-effect" onClick="history.back();">
            <i class="material-icons">keyboard_backspace</i>
            <span>Kembali</span>
         </button>
         <button id="cetak" class="btn bg-teal waves-effect">
            <i class="material-icons">print</i>
            <span>Cetak</span>
    	</button>
        	<div class="card">
            	<div class="header">
                	<h2>
                    	Cetak Bukti Transaksi
                	</h2>
<?php } ?>
<?php 
	//Hitung Semester
	
	$date = date("Y-m-d");
	$jmlSmst = $transaksi['jumlah_semester'];
	$semester = semester($transaksi['tgl_masuk'], $jmlSmst);
    $grade= grade($transaksi["tgl_masuk"], $jmlSmst);
    if(@$_GET['k'] != 'Print'){
   		include "../../../Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";
   	}else{
   		include "Controller/Bendahara/PengaturanData/DataSekolah/profilSekolahQuery.php";
   	}
?>
<?php if(@$_GET['p'] != 'Transaction'){ ?>
<div id="invoice<?php echo $transaksi['idTransaksi'] ?>">
<?php }else{ ?>
<div id="invoice">
<?php } ?> 
<table>
	<tbody>
		<tr style="height: 5px; width: 826px;">
      		<td style="width: 700px; vertical-align: top;">
      			<b class="font-12"><?= $sekolah['nama_sekolah'] ?></b><br>
      			<span class="font-11"><?= $sekolah['alamat_sekolah'] ?></span><br>
      			<span class="font-11"><?= $sekolah['desa_sekolah'] ?> - <?= $sekolah['kecamatan_sekolah'] ?> - <?= $sekolah['kabupaten_sekolah'] ?></span><br>
      			<span class="font-11"><?= $sekolah['provinsi_sekolah'] ?></span><br>
      			<span class="font-11"><?= nohp($sekolah['telp_sekolah']) ?></span><br>
      		</td>
      		<td style="vertical-align: top;"><b class="font-13 font-bold col-black">BUKTI PEMBAYARAN<br>PAYMENT INVOICE</b></td>
    	</tr>
    	<tr style="height: 5px; width: 826px; border-bottom: 2px solid black;">
    	<td>&nbsp;</td>
    	<td>&nbsp;</td>
    	</tr>
	</tbody>
</table>
<br>
<table>
  <tbody class="font-12">
  <tr style="height: 5px;">
      <td>Kpd. Atas Nama / To Name</td>
      <td>&nbsp;:&nbsp;</td>
      <td><b><?= $transaksi['nama_siswa'] ?></b></td>
    </tr>
    <tr>
      <td>No. Pembayaran / Invoice No.</td>
      <td>&nbsp;:&nbsp;</td>
      <td><b><?= $transaksi['no_transaksi'] ?></b></td>
    </tr>
    <tr>
      <td>Tgl. Pembayaran / Date Payment</td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= tgl_indo($transaksi['tgl_transaksi']) ?></td>
    </tr>
    <tr>
      <td>Jam Pembayaran / Time Payment</td>
      <td>&nbsp;:&nbsp;</td>
      <td><?= $transaksi['jam_transaksi'] ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
	<table class="table table-bordered table-striped table-hover" 
		style="width: 855px; height: 43px; margin-left: auto; margin-right: auto;" border="2">
		<thead style="background-color: #ffc107;">
			<tr style="height: 11px;">
				<th style="width: auto; text-align: center; height: 5px;">No. Identitas</th>
				<th style="width: auto; text-align: center; height: 5px;">Kelas</th>
				<th style="width: auto; text-align: center; height: 5px;">Smst</th>
				<th style="width: auto; text-align: center; height: 5px;">Tingkat</th>
				<th style="width: auto; text-align: center; height: 5px;">Jenis Transaksi</th>
				<th style="width: auto; text-align: center; height: 5px;">Petugas</th>
				<th style="width: auto; text-align: center; height: 5px;">Jumlah Bayar</th>
			</tr>
		</thead>
		<tfoot>
			<tr style="height: 11px;">
				<th style="width: auto; text-align: center; height: 13.9375px;">Identity Number</th>
				<th style="width: auto; text-align: center; height: 13.9375px;">Class</th>
				<th style="width: auto; text-align: center; height: 13.9375px;">Smst</th>
				<th style="width: auto; text-align: center; height: 13.9375px;">Grade</th>
				<th style="width: auto; text-align: center; height: 13px;">Transaction Type</th>
				<th style="width: auto; text-align: center; height: 13px;">Officers</th>
				<th style="width: auto; text-align: center; height: 13.9375px;">Amount Of Payment</th>
			</tr>
		</tfoot>
		<tbody>
			<tr style="height: 50px;">
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<b class="font-bold font-13"><?php echo $transaksi['no_idnt'] ?></b>
				</td>
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<b class="font-bold font-13 col-black"><?php echo $transaksi['kelas'] ?></b>
				</td>
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<b class="font-bold font-13"><?php echo semester($transaksi['tgl_masuk'], $jmlSmst); ?></b>
				</td>
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<b class="font-bold font-13"><?php echo $grade ?></b>
				</td>
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<b class="font-bold font-13"><?php echo $transaksi['nama_jenis_transaksi'] ?></b>
				</td>
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<b class="font-bold font-13"><?php echo $transaksi['petugas'] ?></b>
				</td>
				<td style="width: auto; height: 20px; text-align: center; vertical-align: middle;">
					<span class="font-bold col-black font-14">
						<b class="font-bold font-14 col-black">Rp. <?php echo number_format($transaksi['jumlah_bayar']) ?>,-</b>
					</span>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="height: 90px; margin-left: auto; margin-right: auto; width: 826px;">
		<tbody>
			<tr>
				<td style="width: 475px; vertical-align: top;">
					<p class="font-10 col-pink">
						Catatan : <br>
						Harap simpan resi ini sebagai bukti transaksi yang sah dan resmi<br>
						Terimakasih atas kepercayaan bertransaksi anda bersama kami<br><br>
						Note : <br>
						Please keep this receipt as proof of legitimate transaction<br>				
						Thank you for trusting your transaction with us

					</p>
				</td>
				
				<td style="width: 150px;">
					<p><span style="font-size: 10px;">
						<?= $sekolah['kecamatan_sekolah'] ?>, <?php echo tgl_indo($today) ?><br> Petugas / Officers</span>
					</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<h6><p><b><span style="text-decoration: underline;"> <?php echo $transaksi['petugas'] ?></span></b></p></h6>
				</td>
			</tr>
		</tbody>
	</table>
	<p>
		<small>
			<span style="color: #808080; font-size: 10px;">
				Di Cetak Pada / Print On : <?php echo tgl_indo($today) ?> - <?php echo date("H:i:s"); ?>
			</span>
		</small>
	</p>
	<p>
		<span style="color: #808080; font-size: 7px;">
			All copyrights reserved &copy; <?= date('Y') ?>&nbsp; |
			Fininsys | <?= $sekolah['nama_sekolah'] ?>
		</span>
	</p>
</div>
</div>
</div>
</div>
</div>


