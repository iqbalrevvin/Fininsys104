<?php

@session_start();

include "../../server/configdb.php";
include "../../server/Functions.php";
include "session.php";

    if(isset($_POST['add'])){
        date_default_timezone_set('Asia/Jakarta');
        $PlhSiswa       = $_POST['txt_PlhSiswa'];
        $PlhJnsTrans    = $_POST['txt_PlhJnsTrans'];
        $JmlByr         = $_POST['txt_JmlByr'];
        $kodeTransQuery = mysqli_query($db, "SELECT * FROM jenis_transaksi 
                                                WHERE idJenis_transaksi = '$PlhJnsTrans'") 
                                                or die ($db->error);
        $KdTransaksi    = mysqli_fetch_array($kodeTransQuery);
        $kdTrans        = $KdTransaksi['kd_transaksi'];
        //$waktu         = gmdate("Y-m-d H:i:s", time()+60*60*7);
        $tanggal        = date("Y-m-d");
        $jam            = date("H:i:s");
        $NoTrans1       = $kdTrans;
        $NoTrans2       = date("md");
        $NoTrans3       = date("His", time()+60*60*7);
        $tglInput       = date("Y-m-d H:i:s");

        $namasiswa  = mysqli_query($db, "SELECT no_idnt, nama_siswa FROM siswa WHERE no_idnt = '$PlhSiswa'") or die ($db->error);
        $tipe       = mysqli_query($db, "SELECT * FROM jenis_transaksi WHERE idJenis_transaksi = '$PlhJnsTrans' ") or die ($db->error);
        $nama       = mysqli_fetch_array($namasiswa);
        $jenis      = mysqli_fetch_array($tipe);
        $cekjumlah=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi 
                                                          WHERE no_idnt = '$PlhSiswa' 
                                                          AND idJenis_transaksi = '$PlhJnsTrans' ");
        $databayar  = mysqli_fetch_array($cekjumlah);
        $hasilbayar = $databayar['jumlah'] + $JmlByr;
        //lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = $tanggal;
        $jamAct     = $jam;
        $tglJamAct  = $tglInput;
        //$mac        = 
        #$deskSukses = 'Transaksi Berhasil, Input Transaksi Siswa Atas Nama '. $nama['nama_siswa'] . ' Dengan Jumlah '. $JmlByr . ' Jenis Transaksi '.$jenis['nama_jenis_transaksi'];
        #$deskLunas  = 'Transaksi Pembayaran Gagal, Transaksi Siswa Atas Nama '. $nama['nama_siswa'] . ' Dengan Jenis '. $jenis['nama_jenis_transaksi'] . ' Sudah Lunas';
        #$deskLebih = 'Transaksi Pembayaran Gagal, Transaksi Siswa Atas Nama '. $nama['nama_siswa'] . ' Dengan Jenis '. $jenis['nama_jenis_transaksi'] . ' dan Membayar ' .$JmlByr. ' Melebihi Batas';
        $deskSukses = 'Input Transaksi Pembayaran Siswa';
        $deskLunas  = 'Transaksi Pembayaran Siswa Gagal(Siswa Sudah Dinyatakan Lunas)';
        $deskLebih = 'Transaksi Pembayaran Siswa Gagal(Pembayaran Akan Melebihi Jumlah Ketentuan)';
        //-----------------------------

        if($databayar['jumlah'] >= $jenis['kewajiban']){
        ?>
            <div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Sistem Menedeteksi Tunggakan <strong><?php echo $jenis['nama_jenis_transaksi'] ?></strong> 
                        <strong><?php echo $nama['nama_siswa'] ?></strong> 
                        <b class="font-bold col-cyan">Sudah Lunas/Selesai.</b><br> 
                            Mohon Periksa Kembali Status Pembayaran Melalui Halaman Profil Siswa.
                    </p> 
                    <script>
                        swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                    </script>
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskLunas); ?>
            </div>
        <?php 
        }elseif($hasilbayar > $jenis['kewajiban']) { ?>
            <div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Pembayaran Jenis <strong><?php echo $jenis['nama_jenis_transaksi'] ?></strong> Sebesar 
                        <strong>Rp.<?php echo number_format($JmlByr) ?>.-</strong>  
                        Akan Melebihi Batas Kewajiban Pembayaran Yang Sudah Di Tentukan.<br>
                        Jumlah Jenis <strong><?php echo $jenis['nama_jenis_transaksi'] ?></strong> Pada 
                        <strong><?php echo $nama['nama_siswa'] ?></strong>
                        Sudah Di Bayar Sebesar <b class="font-bold col-yellow">"Rp.<?php echo number_format($databayar['jumlah']) ?>.-"</b>
                    </p> 
                    <script>
                        swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                    </script>
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskLebih); ?>
            </div>
        <?php }else{
        $insertTransaksi = $db->query("INSERT INTO transaksi(idTransaksi, idJenis_transaksi, no_transaksi, no_idnt,tgl_transaksi, jam_transaksi, jumlah_bayar, petugas, revisi)VALUES('', '$PlhJnsTrans', '$NoTrans1$NoTrans2$NoTrans3', '$PlhSiswa', '$tanggal', '$jam', '$JmlByr', '$session[nama_tampilan]', '0')") or die ($db->error);

        //$insertLog = $db->query("INSERT INTO log_aktivitas(idLog, idUsers, level, nama_tampilan, tgl_aktivitas, jam_aktivitas, tgl_jam_aktivitas, mac_address, deskripsi_log)VALUES('','$session[idUsers]', '$session[level]', '$session[nama_tampilan]', '$tanggal', '$jam', '$tglInput', '$mac', 'Input Transaksi Baru')")
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskSukses);
        ?>
        <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Pembayaran Jenis <strong><?php echo $jenis['nama_jenis_transaksi'] ?></strong> |  
                    <strong><?php echo $nama['nama_siswa'] ?></strong> Sebesar <strong>Rp.<?php echo number_format($JmlByr) ?>.-</strong> 
                    Berhasil Di Proses.   
                    <script>swal("Proses Berhasil!", "Transaksi Berhasil Di Proses !", "success");</script>   
        </div>
        <?php
}
 }



?>   