<?php
@session_start();
include "../../../Config/ConfigDB.php";
include "../../../Config/Functions.php";
include "../../Session.php";
	
	if(isset($_POST['edit'])){
		date_default_timezone_set('Asia/Jakarta');
		$id 				= $_POST['id'];
		$PlhSiswa			= $_POST['PlhSiswa'];
		$PlhJnsTrans		= $_POST['PlhJnsTrans'];
		$JmlByr 			= $_POST['JmlByr'];
        $ketTransaksi       = $_POST['keterangan'];
		$tanggal       		= date("Y-m-d");
        $jam         		= date("H:i:s");
        $NoTrans1        	= "TRANS";
        $NoTrans2        	= date('dmy');
        $transaksi 			= mysqli_query($db, "SELECT * FROM transaksi WHERE idTransaksi='$id' 
        										 ORDER BY idTransaksi DESC") or die ($db->error);
		$revisi 			= mysqli_fetch_array($transaksi);
		$rev 				= $revisi['revisi'] + 1;
        $tglInput           = date("Y-m-d H:i:s");
		
		$namasiswa  = mysqli_query($db, "SELECT no_idnt, nama_siswa FROM siswa WHERE no_idnt = '$PlhSiswa'") or die ($db->error);
        $tipe       = mysqli_query($db, "SELECT * FROM jenis_transaksi WHERE idJenis_transaksi = '$PlhJnsTrans' ") or die ($db->error);
        $nama       = mysqli_fetch_array($namasiswa);
        $jenis      = mysqli_fetch_array($tipe);
        //mengecek apakah di database transaksi apakah siswa sudah membayar sesuai kewajiban
        $cekjumlah=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi 
                                                          WHERE no_idnt = '$PlhSiswa' 
                                                          AND idJenis_transaksi = '$PlhJnsTrans'");
        $databayar  = mysqli_fetch_array($cekjumlah);
        $hasilbayar = $databayar['jumlah'] + $JmlByr;
        //lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = $tanggal;
        $jamAct     = $jam;
        $tglJamAct  = $tglInput;

        $deskSukses = 'Update Transaksi Pembayaran Siswa';
        $deskLebih = 'Update Transaksi Pembayaran Siswa Gagal(Pembayaran Akan Melebihi Jumlah Ketentuan)';
        $deskLunas  = 'Transaksi Pembayaran Siswa Gagal(Siswa Sudah Dinyatakan Lunas)';
        //-----------------------------

    if($hasilbayar > $jenis['kewajiban']) { ?>
                <div class="alert bg-pink alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p> Pembayaran Jenis <strong class="col-yellow"><?= $jenis['nama_jenis_transaksi'] ?></strong> Sebesar 
                            <strong class="col-yellow">Rp.<?= number_format($JmlByr) ?>.-</strong>  
                            Akan Melebihi Batas Kewajiban Pembayaran Yang Sudah Di Tentukan.<br>
                            Jumlah Jenis <strong class="col-yellow"><?= $jenis['nama_jenis_transaksi'] ?></strong> Pada 
                            <strong class="col-yellow"><?= $nama['nama_siswa'] ?></strong>
                            Sudah Di Bayar Sebesar 
                            <b class="font-bold col-yellow">"Rp.<?php echo number_format($databayar['jumlah']) ?>.-"</b>
                        </p> 
                        <script>
                            swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                        </script>
                        <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskLebih); ?>
                </div><?php 

    }elseif($databayar['jumlah'] >= $jenis['kewajiban']){
                ?>
                <div class="alert bg-pink alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p> Sistem Menedeteksi Tunggakan <strong class="col-yellow"><?= $jenis['nama_jenis_transaksi'] ?></strong>
                            <strong class="col-yellow"><?= $nama['nama_siswa'] ?></strong> 
                            <b class="col-yellow">Sudah Lunas/Selesai.</b><br> 
                            Mohon Periksa Kembali Status Pembayaran Melalui Halaman Profil Siswa.
                        </p> 
                        <script>
                            swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                        </script>
                        <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskLunas); ?>
                </div>
                <?php 

        }else{

		$updateTransaksi = mysqli_query($db,"UPDATE transaksi set idJenis_transaksi='$PlhJnsTrans', no_idnt='$PlhSiswa', tgl_transaksi='$tanggal', jam_transaksi='$jam', jumlah_bayar='$JmlByr', petugas='$session[nama_tampilan]', revisi='$rev',
            ket_transaksi = '$ketTransaksi' where idTransaksi='$id'") or die ($db->error);
            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskSukses);
		?>
		<div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Pembayaran Jenis <strong><?php echo $jenis['nama_jenis_transaksi'] ?></strong> |  
                    <strong><?php echo $nama['nama_siswa'] ?></strong> Sebesar <strong>Rp.<?php echo number_format($JmlByr) ?>.-</strong> 
                    Berhasil Di Perbarui.      
        </div>
            <script>swal("Proses Berhasil!", "Transaksi Berhasil Di Proses !", "success");</script>
        <?php
    }
	}
?>