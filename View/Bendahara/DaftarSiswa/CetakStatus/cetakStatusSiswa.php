<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
        	<div class="header">
            	<h2>
                	STATUS PEMBAYARAN <b><?php echo $profil['nama_siswa'] ?></b>
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
<table style="text-align: center; height: 64px; width: 800px; margin-left: auto; margin-right: auto;">
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
<p class="font-bold font-12" style="text-align: center;"><br />STATUS KEUANGAN SISWA<br /> SISTEM INFORMASI KEUANGAN <?php echo $sekolah['nama_sekolah'] ?>&nbsp;</p>
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
    <!--INFORMASI TRANSAKSI MASUK-->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <!--KONTEN KEWAJIBAN YANG SUDAH DI PENUHI-->
        <div class="header">
            <h5>
                Kewajiban Reguler Yang Sudah Di Penuhi<br>
                    <small>Rekapitulasi Kewajiban Yang Sudah Di Penuhi Hingga Semester <?php echo $semester ?></small>
                </h5>          
        </div><br>
        <table class="table table-bordered table-striped table-hover" 
            style="width: 385px; height: 53px; margin-left: 0px; margin-right: 0px;" border="2">
            <thead style="background-color:#e0ddf0;">
                <tr class="font-10">
                    <th>#</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>           
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                if($profil['pindahan'] == 'YA'){ 
                    $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                            WHERE set_semester BETWEEN '$profil[pindah_di_semester]'
                                                            AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                                            AND tipe_jenis_transaksi = 'REGULER'
                                                            AND tahun_angkatan = '$angkatan'
                                                            ORDER BY set_semester ");
                }else{
                    $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                        WHERE set_semester BETWEEN '1'
                                                        AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                                        AND tipe_jenis_transaksi = 'REGULER'
                                                        AND tahun_angkatan = '$angkatan'
                                                        ORDER BY set_semester ");
                }
                while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
                ?>
                <tr>
                    <th class="font-10" scope="row"><?php echo $no++; ?></th>
                    <td class="font-10"><?php echo $kewajiban['nama_jenis_transaksi'] ?></td>
                    <td class="font-10"><?php echo $kewajiban['keterangan_transaksi'] ?></td>
                        <!--Identifikasi Jumlah Pembayaran PerJenis Transaksi-->
                        <?php
                        $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                    FROM transaksi 
                                                    WHERE no_idnt = '$profil[no_idnt]' 
                                                    AND idJenis_transaksi = '$kewajiban[idJenis_transaksi]' ");
                        $jumlah=mysqli_fetch_array($total);
                        ?>
                        <td class="font-10">
                            <strong>Rp.<?php echo number_format($jumlah['jumlah']) ?>.-</strong>
                        </td>
                        </tr>
                <?php } ?>
            <tfoot>
                <tr class="font-bold font-10" style="background-color: #e0ddf0;">
                <?php
                //Kewajiban Yang Sudah Bayar
                if($profil['pindahan'] == 'YA'){
                    $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                FROM transaksi JOIN jenis_transaksi 
                                                ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                WHERE set_semester between '$profil[pindah_di_semester]' 
                                                AND '$semester' AND transaksi.no_idnt = '$profil[no_idnt]'
                                                AND tipe_jenis_transaksi = 'REGULER'");
                }else{
                    $total=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                FROM transaksi JOIN jenis_transaksi 
                                                ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                                WHERE set_semester between '1' AND '$semester' 
                                                AND transaksi.no_idnt = '$profil[no_idnt]'
                                                AND tipe_jenis_transaksi = 'REGULER'");
                }
                                    
                $jumlah=mysqli_fetch_array($total);
                $jumlahBayar = $jumlah['jumlah'];
                ?>
                <td style="text-align: center; vertical-align: middle;" colspan="3">
                    Jumlah Kewajiban Yg Sudah Di Penuhi
                </td>
                <td class="font-11">
                    <strong>Rp.<?php echo number_format($jumlahBayar) ?>.-</strong>
                </td>
                                		
                </tr>
            </tfoot>
        </tbody>
    </table>
</div>
<!---//////////////////////////-->
<!--KONTEN KEWAJIBAN YANG HARUS DI PENUHI-->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="header">
<h5>
    Kewajiban Reguler Yang Harus Dipenuhi<br>
        <small>Rekapitulasi Kewajiban Yang Harus Di Penuhi Hingga Semester <?php echo $semester ?></small>
</h5>     
</div><br>
<table class="table table-bordered table-striped table-hover" 
        style="width: 385px; height: 53px; margin-left: auto; margin-right: 100px;" border="3">
    <thead style="background-color:#e0ddf0;">
        <tr class="font-10">
            <th>#</th>
            <th>Jenis</th>
            <th>Keterangan</th>
            <th>Jumlah</th>         
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        if($profil['pindahan'] == 'YA'){ 
            $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                                ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                WHERE set_semester BETWEEN '$profil[pindah_di_semester]'
                                                AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                                AND tipe_jenis_transaksi = 'REGULER'
                                                AND tahun_angkatan = '$angkatan'
                                                ORDER BY set_semester ");
        }else{
            $kewajibanQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                                ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                                WHERE set_semester BETWEEN '1'
                                                AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                                AND tipe_jenis_transaksi = 'REGULER'
                                                AND tahun_angkatan = '$angkatan'
                                                ORDER BY set_semester ");
        }
        while($kewajiban = mysqli_fetch_array($kewajibanQuery)){
        ?>
        <tr class="font-10">
            <th class="font-10" scope="row"><?php echo $no++ ?></th>
            <td class="font-10"><?php echo $kewajiban['nama_jenis_transaksi'] ?></td>
            <td class="font-10"><?php echo $kewajiban['keterangan_transaksi'] ?></td>
            <td class="font-10"><strong>Rp.<?php echo number_format($kewajiban['kewajiban']) ?>.-</strong></td>            
        </tr>             
        <?php } ?>
        <tfoot>        
        <tr class="font-bold font-10" style="background-color: #e0ddf0;">
            <td class="font-10" style="text-align: center; vertical-align: middle;" colspan="3">
                <strong>Jumlah Kewajiban Yg Harus Di Penuhi <strong>
            </td>
            <?php
            //Kewajiban Yang Harus DI bayar
            if($profil['pindahan'] == 'YA'){ 
            $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                            FROM jenis_transaksi JOIN master_transaksi 
                                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
                                            WHERE set_semester between '$profil[pindah_di_semester]' 
                                            AND '$semester' AND idJurusan = '$profil[idJurusan]'
                                            AND tipe_jenis_transaksi = 'REGULER'
                                            AND tahun_angkatan='$angkatan'");
            }else{
            $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn 
                                            FROM jenis_transaksi JOIN master_transaksi 
                                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi WHERE 
                                            set_semester between '1' and '$semester' 
                                            AND idJurusan = '$profil[idJurusan]'
                                            AND tipe_jenis_transaksi = 'REGULER'
                                            AND tahun_angkatan='$angkatan'");
            }
            $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
            //Kewajiban Yang Sudah Bayar
            $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
            ?>
            <td class="font-bold font-10">
                <b>Rp.<?php echo number_format($jmlKewajiban) ?>.-</b>
            </td>
        </tr>
        </tfoot>
    </tbody>
</table>
</div>
</div>
<!---//////////////////////////-->

<!--KONTEN REKAPITULASI TUNGGAKAN-->
<?php $tunggakansmstr = $jmlKewajiban-$jumlahBayar; ?>                
<table style="height: 26px; width: 400px;">
    <tbody>
        <tr>
            <td style="width: 250px;">
                <span class="font-bold font-12">
                    <u>Rekapitulasi</u>
                </span>
            </td>
            <td style="width: 10px;">
                <span class="font-12"></span>
            </td>
            <td style="width: 180px;">
                <span class="font-12"></span>
            </td>
        </tr>
        <tr>
            <td style="width: 250px;">
                <span class="font-12">
                 Kewajiban Yang Harus Di Penuhi
                </span>
            </td>
            <td style="width: 10px;">
                <span class="font-12">:</span>
            </td>
            <td style="width: 180px;">
                <span class="font-12">Rp.<?= number_format($jmlKewajiban) ?>.-</span>
            </td>
        </tr>
        <tr>
            <td style="width: 250px;">
                <span class="font-12">
                    Kewajiban Yang Sudah Masuk
                </span>
            </td>
            <td style="width: 10px;">
                <span class="font-12">:</span>
            </td>
            <td style="width: 180px;">
                <span class="font-12">Rp.<?= number_format($jumlahBayar) ?>.-</span>
            </td>
        </tr>
        <tr>
            <td style="width: 250px;">
                <span class="font-12">
                    Tunggakan
                </span>
            </td>
            <td style="width: 10px;">
                <span class="font-bold font-12">:</span>
            </td>
            <td style="width: 180px;">
                <span class="font-bold font-12">Rp.<?= number_format($tunggakansmstr) ?>.-</span>
            </td>
        </tr>
        <tr>
            <td style="width: 250px;">
                <span class="font-12">
                    Status
                </span>
            </td>
            <td style="width: 10px;">
                <span class="font-12">:</span>
            </td>
            <td style="width: 180px;">
                    <?php if($tunggakansmstr>0){ ?>
                <span class="font-bold col-pink font-12">Belum Selesai</span>
                    <?php }else{ ?>
                <span class="font-bold col-teal font-12">Selesai</span>
                <?php } ?>
            </td>
        </tr>
    </tbody>
</table>
<hr>

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
    <table class="table table-bordered table-striped table-hover font-12" style="width: 800px; height: 0px;" border="3">
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




<!--FOOTER/TANDA TANGAN-->
<table style="height: 117px; margin-left: auto; margin-right: auto; width: 826px;">
    <tbody>
        <tr>
            <td style="width: 275px;">&nbsp;</td>
            <td style="width: 358px;">&nbsp;</td>
            <td style="width: 171px;">
                <p><span style="font-size: 10px;">
                   <?php echo $sekolah['desa_sekolah'] ?>, <?php echo tgl_indo($today) ?><br>Keuangan - <?php echo $sekolah['nama_sekolah'] ?></span>
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
<hr/>
<p>
    <span style="color: #808080; font-size: 7px;">
        All copyrights reserved &copy; 2018&nbsp; |
        Fininsys | <?= $sekolah['nama_sekolah'] ?>
    </span>
</p>
<!---//////////////////////////-->
</div><!---AKHIR PRINT DOKUMEN-->























            



