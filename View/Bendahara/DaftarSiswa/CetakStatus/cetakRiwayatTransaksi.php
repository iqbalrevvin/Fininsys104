<?php
                                    //Kewajiban Yang Sudah Bayar
    $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                        FROM transaksi JOIN jenis_transaksi 
                        ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                        WHERE transaksi.no_idnt = '$profil[no_idnt]'");
$jumlah=mysqli_fetch_array($total);
$jumlahBayar = $jumlah['jumlah'];
?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
        	<div class="header">
            	<h2>
                	Riwayat Transaksi <b><?php echo $profil['nama_siswa'] ?></b>
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
<p class="font-bold font-12" style="text-align: center;"><br />RIWAYAT TRANSAKSI SISWA<br /> SISTEM INFORMASI KEUANGAN SMK IKA KARTIKA&nbsp;</p>
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
                <p>Nama/Name :&nbsp;<strong><?= $profil['nama_siswa'] ?></strong><br /> NIPD/Student Identity :&nbsp;
                <strong><?= $profil['no_idnt'] ?></strong><br /> 
                Kelas/Class :&nbsp;<strong><?= $profil['kelas'] ?></strong><br /> 
                Semester :&nbsp;<strong><?= $semester ?></strong>
                <br>Tingkat/Grade :&nbsp;<strong><?= $grade ?></strong></p>
            </span>
        </td>
    </tr>
</table>
<!--//////////////////////////-->
            <div class="row clearfix">
                <!--INFORMASI TRANSAKSI MASUK-->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--KONTEN KEWAJIBAN YANG SUDAH DI PENUHI-->
                	<div class="header">
                    	<h5>
                        	Riwayat Transaksi Masuk<br>
                            	<small>Daftar Riwayat Transaksi Siswa</small>
                        	</h5>          
                    </div><br>
                        	<table class="table table-bordered table-striped table-hover" 
                            style="width: 1000px; height: 53px; margin-left: auto; margin-right: auto;" border="5">
                        <thead style="background-color:#e0ddf0;">
                            <tr>
                                <th>#</th>
                                <th>No Transaksi</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th>Tgl Trnsksi</th>
                                <th>Jam</th>
                                <th>Petugas</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tfoot >
                            <tr>
                                <th style="vertical-align: middle; text-align: center;">#</th>
                                <th style="vertical-align: middle; text-align: center;" >No Transaksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jenis</th>
                                <th style="vertical-align: middle; text-align: center;">Keterangan</th>
                                <th style="vertical-align: middle; text-align: center;">Tgl Trnsksi</th>
                                <th style="vertical-align: middle; text-align: center;">Jam</th>
                                <th style="vertical-align: middle; text-align: center;">Petugas</th>
                                <th style="vertical-align: middle; text-align: center;">
                                    <h5>Rp.<?php echo number_format($jumlahBayar) ?>.-</h5>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include "Controller/Bendahara/DaftarSiswa/ProfilSiswa/riwayatTransaksiQuery.php";
                            $no = 1;
                            while($rwy = mysqli_fetch_array($rwyTransQuery)){
                            $scure= md5(md5($rwy['no_transaksi']).md5('qwerty12345'));     
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><b><?php echo $rwy['no_transaksi'] ?></b></td>
                                <td><?php echo $rwy['nama_jenis_transaksi'] ?></td>
                                <td><?php echo $rwy['keterangan_transaksi'] ?></td>
                                <td><?php echo ubahTgl($rwy['tgl_transaksi']) ?></td>
                                <td><?php echo $rwy['jam_transaksi'] ?></td>
                                <td><?php echo $rwy['petugas'] ?></td>
                                <td><?php echo "<b>Rp.".number_format($rwy['jumlah_bayar']).",-</b>" ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    
                    <!---//////////////////////////-->
                    


<hr>
    <table style="height: 117px; margin-left: auto; margin-right: auto; width: 826px;">
        <tbody>
            <tr>
                <td style="width: 275px;">&nbsp;</td>
                <td style="width: 358px;">&nbsp;</td>

                <td style="width: 171px;"><p><span style="font-size: 10px;">
                                                Tanggulun, <?php echo tgl_indo($today) ?><br>Keuangan - SMK IKA KARTIKA</span>
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
</div><!---AKHIR PRINT DOKUMEN--></div>























            



