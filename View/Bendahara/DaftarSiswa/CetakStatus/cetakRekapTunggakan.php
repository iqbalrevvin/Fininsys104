<?php 
$no = 1;
$pindahan = $profil['pindahan'];
$pindahSemester = $profil['pindah_di_semester'];
$jumlahSemester = $profil['jumlah_semester'];
$idProdi = $profil['idJurusan'];
#$tahunAngkatan = $angkatan;
$tipe = 'REGULER';
$idnt = $profil['no_idnt'];
require_once('Controller/Bendahara/DaftarSiswa/CetakDokumen/cetakRekapTunggakan.php');
?>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
        	<div class="header">
            	<h2>
                	Rekapitulasi Tunggakan <b><?php echo $profil['nama_siswa'] ?></b>
                    	<small>Pastikan Kertas Anda Di Sett Dalam Ukuran A4/F4</small>
            	</h2>    
             	<ul class="header-dropdown m-r--5">
                 	<button class="btn bg-blue-grey waves-effect" onClick="history.back();">
                 		<i class="material-icons">keyboard_backspace</i>
                 		<span>Kembali</span>
             		</button>
             		<button id="cetak" class="btn bg-blue waves-effect">
                 		<i class="material-icons">print</i>
                  		<span>Cetak</span>
             		</button>
            	</ul>  
        	</div>
            <div id="invoice">

<!--KOP SEKOLAH-->
<table style="height: 64px; width: 800px; margin-left: auto; margin-right: auto;">
     <tbody>
        <tr style="height: 97px; text-align: center; border-bottom:2px solid black; vertical-align: middle;">
            <td style="width: 100px; height: 97px;">
            <?php if($sekolah['logo_sekolah'] != ''){ ?>
                <img style="text-align: center; margin-bottom: 25px; margin-left: auto; margin-right: auto;" class="" 
                     src="assets/images/sekolah/<?php echo $sekolah['logo_sekolah'] ?>" width="85" height="85" alt="Logo Sekolah">
            <?php }else{} ?>
            </td>
            <td style="width: 400px; text-align: center; height: 97px;">
                <p class="font-13">
                    <strong><?php echo $sekolah['nama_yayasan'] ?></strong><br>
                    <strong><?php echo $sekolah['nama_sekolah'] ?></strong><br>
                   
                    <strong>Terakreditasi "<?php echo $sekolah['akreditasi'] ?>"</strong><br>
                    <strong><?php echo $sekolah['no_sk_akreditasi'] ?></strong><br>
                    <strong>
                        <?php echo $sekolah['alamat_sekolah'] ?> - <?php echo $sekolah['desa_sekolah'] ?>
                        - <?php echo $sekolah['kecamatan_sekolah'] ?> - <?php echo $sekolah['kabupaten_sekolah'] ?>
                        - <?php echo $sekolah['provinsi_sekolah'] ?>
                    </strong><br>
                    <strong>
                        <?php echo $sekolah['telp_sekolah'] ?> - <?php echo $sekolah['email_sekolah'] ?>
                        - <?php echo $sekolah['website_sekolah'] ?>
                    </strong>
                </p>
            </td>
            <td style="width: 100px; height: 97px;">
                <?php if($sekolah['logo_dinas'] != ''){ ?>
                <img style="text-align: center; margin-bottom: 25px; margin-left: 0px; margin-right: 0px;" 
                    class="" src="assets/images/sekolah/<?php echo $sekolah['logo_dinas'] ?>" width="85" height="85" alt="Logo Dinas">
                <?php }else{} ?>
            </td>
        </tr>
    </tbody>
</table>
<!--//////////////////////////-->

<!--JUDUL DOKUMEN-->
<p class="font-bold font-12" style="text-align: center;"><br />REKAPITULASI TUNGGAKAN SISWA<br /> SISTEM INFORMASI KEUANGAN <?php echo $sekolah['nama_sekolah'] ?>&nbsp;</p>
<hr>
<!--//////////////////////////-->

<!--FOTO DAN KETERANGAN SISWA-->
<table style="height: 64px; width: 800px; margin-left: 0px; margin-right: 0px;">
    <tr>
        <td style="width: 100px; height: 97px;">
        <?php if($profil['foto']==''){
            if($profil['jenis_kelamin']=='L'){ ?>
                <img style="text-align: right; margin-bottom: 10px; margin-left: 25px; margin-right: 0px;" 
                     class="profile-user-img img-responsive img-circle" 
                     src="assets/images/pas-foto-siswa/user-L.png" 
                     align="center" width="85" height="85" alt="User profile picture">
            <?php }else{?>
                <img style=="text-align: right; margin-bottom: 10px; margin-left: 25px; margin-right: 0px;" 
                     class="profile-user-img img-responsive img-circle" 
                     src="assets/images/pas-foto-siswa/user-P.png" 
                     align="center" width="85" height="85" alt="User profile picture">
            <?php } ?>
            <?php }else{ ?>
                <img style="text-align: right; margin-bottom: 10px; margin-left: 25px; margin-right: 0px;" class="profile-user-img img-responsive img-thumbnail" 
                     src="assets/images/pas-foto-siswa/<?php echo $profil['foto'] ?>" 
                      width="85" height="85" alt="User profile picture">
                <?php } ?>
        </td>
        <td style="width: 460px; height: 97px;">
            <span style="font-size: 12px;">
                <p>Nama/Name :&nbsp;<strong><?php echo $profil['nama_siswa'] ?></strong><br /> NIPD/Student Identity :&nbsp;
                <strong><?php echo $profil['nipd'] ?></strong><br /> 
                Kelas/Class :&nbsp;<strong><?php echo $profil['kelas'] ?></strong><br /> 
                Semester :&nbsp;<strong><?php echo $semester ?></strong>
                <br>Tingkat/Grade :&nbsp;<strong><?php echo $grade ?></strong></p>
            </span>
        </td>
    </tr>
</table>
<!--//////////////////////////-->

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="header">
            <h5>
                Rekapitulasi Tunggakan Keseluruhan<br>
                <small>Rekapitulasi Tunggakan & Kewajiban Yang Sudah/Belum Selesai </small>
            </h5>          
        </div><br>
        <table class="table table-bordered table-striped table-hover" 
                style="width: 1000px; height: 53px; margin-left: auto; margin-right: auto;" border="5">
        <thead style="background-color:#e0ddf0;">
            <tr class="font-16">
                <th>#</th>
                <th>Jenis</th>
                <th>Keterangan Jenis</th>
                <th>Masuk</th>
                <th>Kewajiban</th>
                <th>Status</th>           
            </tr>
        </thead>
            <tbody class="font-14">
                <?php
                    $kewajibanQuery = $rekapTunggakan->dataRekapReguler($pindahan, $pindahSemester, $jumlahSemester, $idProdi, $angkatan, $tipe);
                    while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
                        $idJenisTransaksi = $kewajiban['idJenis_transaksi'];
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?= $kewajiban['nama_jenis_transaksi'] ?></td>
                    <td><?= $kewajiban['keterangan_transaksi'] ?></td>
                    <!--Jumlah yang sudah dibayar berdasarkan semester -->
                        <?php
                        $total = $rekapTunggakan->kewajibanMasuk($idnt, $idJenisTransaksi);
                        $jumlah=mysqli_fetch_array($total);
                        ?>
                        <?php if($jumlah['jumlah']==''){ ?>
                    <td>Rp. 0,-</td> 
                        <?php }else{ ?>  
                    <td><strong>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</strong></td>
                        <?php } ?>
                        <!--Jumlah Kewajiban yang harus dibayar berdasarkan semester -->
                    <td>Rp.<?php echo number_format($kewajiban['kewajiban']) ?>.-</td>
                        <!--Status Pembayaran-->
                        <?php if($jumlah['jumlah']>=$kewajiban['kewajiban']){ ?>
                    <td class="font-bold col-teal">Selesai</td>    
                        <?php }else{ ?>
                                <td class="font-bold col-pink">Belum Selesai</td>  
                        <?php } ?>
                </tr>
                        <?php } ?>
                                <!--Jumlah Semua Transaksi Yang Masuk -->
                <tr class="font-bold" 
                    style="background-color: #e0ddf0; border-bottom: 2px solid black; border-top: 2px solid black;">
                    <td style="text-align: left; vertical-align: middle;" colspan="6">
                        <?php $jumlah = $rekapTunggakan->semuaTransaksiMasuk($idProdi, $angkatan, $tipe, $idnt); ?>
                        Jumlah Kewajiban Yg Masuk : <b>Rp.<?= number_format($jumlah) ?>.-</b>
                    </td>
                </tr>
                    <!--Jumlah Kewajiban Yang Harus Dibayar -->
                <tr class="font-bold" style="background-color: #e0ddf0; border-bottom: 2px solid black;">
                    <td style="text-align: left; vertical-align: middle;" colspan="6">
                        <?php $jmlKewajiban = $rekapTunggakan->KewajibanHarusBayar($pindahan, $pindahSemester, $jumlahSemester, $idProdi, $angkatan, $tipe); 
                        ?>
                        Jumlah Kewajiban Yg Harus di Penuhi: 
                        <b>Rp.<?= number_format($jmlKewajiban) ?>.-</b>
                    </td>
                 </tr>
                 <tr class="font-bold" style="background-color: #e0ddf0; border-bottom: 2px solid black;">
                     <td style="text-align: left; vertical-align: middle;" colspan="6">
                        <?php $tunggakan = $rekapTunggakan->tunggakanReguler($jumlah, $jmlKewajiban); ?>
                        <?php if($tunggakan<0){ ?>
                            Tunggakan Keseluruhan  : 
                            <b class="font-bold col-pink">Rp.<?php echo number_format($tunggakan) ?>.-</b>
                        <?php }else{ ?>
                            Simpanan    :
                            <b class="font-bold col-teal">Rp.<?php echo number_format($tunggakan) ?>.-</b>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!---//////////////////////////-->

<!--CEK DATA PEMBAYARAN KHUSUS-->
<?php
$cekDataPembayaranKhususSQL = "SELECT * FROM jenis_transaksi_khusus JOIN siswa
                                ON jenis_transaksi_khusus.no_idnt = siswa.no_idnt
                                WHERE siswa.idSiswa = '$ID'";
$cekDataPembayaranKhusus = $db->query($cekDataPembayaranKhususSQL) or die ($db->error);
if($cekDataPembayaranKhusus->num_rows > 0) {
?>

<!--KEWAJIBAN PEMBAYARAN KHUSUS-->
    <div class="header">
<h5>
    Status Kewajiban Pembayaran Khusus<br>
    <small>Rekapitulasi Kewajiban Pembayaran Khusus</small>
</h5>     
</div><br>
    <table class="table table-bordered table-striped table-hover font-12" style="width: 1000px; height: 0px;" border="3">
        <thead style="background-color:#e0ddf0;">
            <tr>
                <th>No.</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Tahun</th>
                <th>Jumlah Kewajiban</th> 
                           
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                    ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                                    JOIN master_transaksi 
                                                    ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
                                                    WHERE no_idnt = '$profil[no_idnt]' ORDER BY set_semester");

            while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
            ?>
            <tr class="font-12">
                <th scope="row"><?php echo $no++ ?></th>
                <td><?= $kewajiban['nama_jenis_transaksi'] ?></td>
                <td><?= $kewajiban['keterangan_transaksi'] ?></td>
                <td><?= $kewajiban['tahun_pembayaran'] ?></td>
                <td><strong>Rp.<?php echo number_format($kewajiban['kewajiban']) ?>.-</strong></td>   
            </tr>             
            <?php } ?>
            
            <tr class="font-bold font-12" 
                        style="background-color: #e0ddf0; border-bottom: 3px solid black; border-top: 2px solid black;">
                <td style="text-align: left; vertical-align: middle;" colspan="4" >
                    Jumlah Kewajiban <b>Khusus / Tambahan</b> Yg Harus Di Penuhi
                </td>
                <?php
                    $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                                        FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                        ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi WHERE 
                                                        no_idnt = '$profil[no_idnt]' ORDER BY set_semester");
                    $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
                    $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
                ?>
                <td>
                    <h4 class="font-bold font-12">Rp.<?php echo number_format($jmlKewajiban) ?>.-</h4>
                </td>
                </tr>
                <tr class="font-bold font-12" 
                    style="background-color: #e0ddf0; border-bottom: 3px solid black; border-top: 2px solid black;">
                    <td style="text-align: left; vertical-align: middle;" colspan="4">
                        Jumlah Kewajiban <b>Khusus / Tambahan</b> Yg Sudah Di Penuhi
                    </td>
                    <?php
                    //Kewajiban Yang Sudah Bayar
                        $jenisKewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi_khusus JOIN jenis_transaksi
                                                        ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                        WHERE jenis_transaksi_khusus.no_idnt = '$profil[no_idnt]'
                                                        ORDER BY set_semester");
                            $jenisKewajiban = mysqli_fetch_array($jenisKewajibanQuery);
                            $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah FROM transaksi WHERE no_idnt = '$profil[no_idnt]' 
                                                        AND idJenis_transaksi = '$jenisKewajiban[idJenis_transaksi]' ");
                            $jumlah=mysqli_fetch_array($total);
                            $jumlahBayar = $jumlah['jumlah'];
                        ?>
                        <td>
                            <h4 class="font-bold font-12">Rp.<?php echo number_format($jumlahBayar) ?>.-</h4>
                        </td>
                        </tr> 
                        <?php 
                            $tunggakansmstr = $jumlahBayar-$jmlKewajiban;
                        ?>
                        <tr class="font-bold font-12" style="background-color: #e0ddf0; border-bottom: 3px solid black;">
                        <td class="font-bold font-12" style="text-align: left; vertical-align: middle;" colspan="4">
                            <?php if($tunggakansmstr>0){ ?> 
                            Jumlah Simpanan Di Kewajiban <b>Khusus / Tambahan</b>
                            <?php }else{ ?>
                            Jumlah Tunnggakan Kewajiban <b>Khusus / Tambahan</b>
                            <?php } ?>
                        </td>
                                <td>
                                        <?php 
                                            $tunggakansmstr = $jumlahBayar-$jmlKewajiban;
                                            if($tunggakansmstr>0){ 
                                        ?>
                                    <h4 class="font-bold col-teal font-13">
                                        Rp.<?php echo number_format($tunggakansmstr) ?>.-
                                    </h4>
                                        <?php }else{ ?>
                                    <h4 class="font-bold col-teal font-13">
                                        <b class="font-bold col-pink">Rp.<?php echo number_format($tunggakansmstr) ?>.-</b>
                                    </h4>
                                        <?php } ?>
                                </td>
                            </tr>                   
                        </tbody>
                    </table>
<?php } ?>






    <table style="height: 117px; margin-left: auto; margin-right: auto; width: 826px;">
        <tbody>
            <tr>
                <td style="width: 275px;">&nbsp;</td>
                <td style="width: 358px;">&nbsp;</td>

                <td style="width: 171px;"><p><span style="font-size: 10px;">
                                                Tanggulun, <?php echo tgl_indo($today) ?><br>Keuangan - <?php echo $sekolah['nama_sekolah'] ?></span>
                                         </p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <h6><p><b><span style="text-decoration: underline;"> <?php echo $namaTampilan ?></span></b></p></h6>
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        <small>
            <span style="color: #808080; font-size: 10px;">
            
                Di Cetak Pada Tanggal : <?php echo tgl_indo($today) ?> - <?php echo gmdate(date("H:i:s")) ?>
            </span>
        </small>
    </p>
    <hr /><span style="color: #808080; font-size: 7px;">
            All copyrights reserved &copy; 2018&nbsp; |
            Fininsys | <?= $sekolah['nama_sekolah'] ?>
        </span>
<!---//////////////////////////-->
</div><!---AKHIR PRINT DOKUMEN-->























            



