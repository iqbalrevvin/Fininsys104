<?php
@session_start();
include "../../../Config/ConfigDB.php";
include "../../../Config/Functions.php";
include "../../Session.php";

    if(isset($_POST['add'])){
        date_default_timezone_set('Asia/Jakarta');
        $PlhSiswa       = $_POST['txt_PlhSiswa'];
        $PlhJnsTrans    = $_POST['txt_PlhJnsTrans'];
        $JmlByr         = $_POST['txt_JmlByr'];
        $ketTransaksi   = $_POST['txt_keterangan'];
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

        //lOG Aktivitas -------------------------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = $tanggal;
        $jamAct     = $jam;
        $tglJamAct  = $tglInput;
        //---------------------------------------------

        $deskSukses = 'Input Transaksi Pembayaran Siswa';
        $deskLunas  = 'Transaksi Pembayaran Siswa Gagal(Siswa Sudah Dinyatakan Lunas)';
        $deskLebih = 'Transaksi Pembayaran Siswa Gagal(Pembayaran Akan Melebihi Jumlah Ketentuan)';
        $deksTdkSesuai = 'Transaksi Pembayaran Siswa Gagal(Prodi Dari Jenis Transaksi Tidak Sesuai)';
        //-----------------------------

        //QUERY MENCARI NAMA SISWA
        $namasiswa  = mysqli_query($db, "SELECT no_idnt, nama_siswa FROM siswa WHERE no_idnt = '$PlhSiswa'") or die ($db->error);
        //QUERY MENCARI JENIS TRANSAKSI
        $tipe       = mysqli_query($db, "SELECT * FROM jenis_transaksi WHERE idJenis_transaksi = '$PlhJnsTrans' ") or die ($db->error);
        //---------------------------------------------
        $nama       = mysqli_fetch_array($namasiswa);
        $jenis      = mysqli_fetch_array($tipe);
        //---------------------------------------------

        //QUERY MENCARI PROGRAM STUDI SISWA
        $prodiSiswaQr  = $db->query("SELECT *
                                        FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas
                                        JOIN prodi ON kelas.idJurusan = prodi.idJurusan
                                        WHERE siswa.no_idnt = '$PlhSiswa'") or die ($db->error);
        //IDENTIFIKASI PROGRAM STUDI SISWA
        $prodiQr  = mysqli_fetch_array($prodiSiswaQr);
        $prodiSiswa = $prodiQr['nama_jurusan'];
        //-------------------------------------------------

        //QUERY MENCARI PROGRAM STUDI JENIS PEMBAYARAN
        $prodiJenisTransaksiQr = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                             ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                             JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
                                             WHERE idJenis_transaksi = '$PlhJnsTrans'") or die ($db->error);
        //IDENTIFIKASI PROGRAM STUDI DARI JENIS TRANSAKSI YANG DI PILIH
        $prodiJenisTransaksi = mysqli_fetch_array($prodiJenisTransaksiQr);
        $prodiJnsTrans = $prodiJenisTransaksi['nama_jurusan'];
        //------------------------------------------------------------------------------------------------------------

        //QUERY MENCARI TAHUN ANGKATAN SISWA
        $thnAngkatanSiswaQr = $db->query("SELECT year(tgl_masuk), no_idnt FROM siswa WHERE siswa.no_idnt = '$PlhSiswa' ") or die ($db->error);
        //IDENTIFIKASI PROGRAM STUDI DARI JENIS TRANSAKSI YANG DI PILIH
        $thnAngkatanSiswa = mysqli_fetch_array($thnAngkatanSiswaQr);
        $angkatanSiswa = $thnAngkatanSiswa['year(tgl_masuk)'];
        //------------------------------------------------------------------------------------------------------------

        //QUERY MENCARI TAHUN ANGKATAN JENIS PEMBAYARAN
        $thnAngkatanJenisTransaksiQr = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi 
                                             ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                             JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
                                             WHERE idJenis_transaksi = '$PlhJnsTrans'") or die ($db->error);
        //IDENTIFIKASI PROGRAM STUDI DARI JENIS TRANSAKSI YANG DI PILIH
        $thnAngkatanJenisTransaksi = mysqli_fetch_array($thnAngkatanJenisTransaksiQr);
        $angkatanJnsTrans = $thnAngkatanJenisTransaksi['tahun_angkatan'];
        //------------------------------------------------------------------------------------------------------------

        
        //IDENTIFIKASI JENIS PEMBAYARAN KHUSUS SISWA
        #$jenisPembayaranKhusus = mysqli_fetch_array($jenisPembayaranKhususQr);
        #$pembayaranKhusus = $thnAngkatanJenisTransaksi['tahun_angkatan'];
        //------------------------------------------------------------------------------------------------------------
        if($jenis['tipe_jenis_transaksi'] == 'KHUSUS'){
            //QUERY MENCARI JENIS PEMBAYARAN KHUSUS PADA SISWA
            $jenisPembayaranKhususQr = $db->query("SELECT * FROM jenis_transaksi_khusus JOIN jenis_transaksi 
                                            ON jenis_transaksi_khusus.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                            WHERE jenis_transaksi_khusus.idJenis_transaksi = '$PlhJnsTrans' AND no_idnt = '$PlhSiswa' ")
                                            or die ($db->error);
            //MELIHAT APAKAH SISWA SUDAH DI TETAPKAN PEMBAYARAN KHUSUS
            if($jenisPembayaranKhususQr->num_rows < 1){
                ?>
                <div class="alert bg-pink alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p> Siswa Atas Nama <strong class="col-yellow"><?= $nama['nama_siswa'] ?></strong> Belum Ditambahkan Pembayaran 
                        <strong class="col-yellow"><?= $jenis['nama_jenis_transaksi'] ?></strong><br>
                        Mohon periksa dan tambahkan terlebih dahulu pembayaran khusus di Profil Siswa Bersangkutan.
                    </p> 
                    <script>
                        swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                    </script>
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Karena Belum Terdaftar Pembayaran Khusus'); ?>
                </div>
                <?php
            }else{
                $insertTransaksi = $db->query("INSERT INTO transaksi(idTransaksi, idJenis_transaksi, no_transaksi, no_idnt,tgl_transaksi, jam_transaksi, jumlah_bayar, petugas, revisi, ket_transaksi)VALUES('', '$PlhJnsTrans', '$NoTrans1$NoTrans2$NoTrans3', '$PlhSiswa', '$tanggal', '$jam', '$JmlByr', '$session[nama_tampilan]', '0', '$ketTransaksi')") or die ($db->error);

                ?>
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Pembayaran Jenis <strong><?= $jenis['nama_jenis_transaksi'] ?></strong> |  
                    <strong><?= $nama['nama_siswa'] ?></strong> Sebesar <strong>Rp.<?php echo number_format($JmlByr) ?>.-</strong>
                    Berhasil Di Proses.   
                    <script>swal("Proses Berhasil!", "Transaksi Berhasil Di Proses !", "success");</script>   
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskSukses); ?>
                </div>
            <?php
            }
        //KONDISI JIKA PROGRAM STUDI SISWA TIDAK SESUAI DENGAN PROGRAM STUDI JENIS TRANSAKSI
        }elseif($prodiSiswa != $prodiJnsTrans){
        ?>
            <div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Jenis Transaksi <strong class="col-yellow"><?= $jenis['nama_jenis_transaksi'] ?></strong> 
                        Tidak Sesuai Dengan Program Studi <strong class="col-yellow"><?= $nama['nama_siswa'] ?></strong><br> 
                        <!--<b class="font-bold col-cyan">Sudah Lunas/Selesai.</b><br> -->
                            Mohon Periksa Kembali Paramater Inputan Anda, Pastikan Jenis Transaksi Sudah Sesuai!.
                    </p> 
                    <script>
                        swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                    </script>
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Karena Program Studi Siswa Tidak Sesuai Dengan Program Studi Pembayaran'); ?>
            </div>
        <?php
        //KONDISI JIKA TAHUN ANGKANGATAN SISWA TIDAK SESUAI DENGAN TAHUN ANGKATAN PEMBAYARAN
        }elseif($angkatanSiswa != $angkatanJnsTrans){ ?>
            <div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Tahun Jenis Transaksi <strong class="col-yellow"><?= $jenis['nama_jenis_transaksi'] ?></strong> 
                        Tidak Sesuai Dengan Tahun Angkatan <strong><?= $nama['nama_siswa'] ?></strong><br> 
                        <!--<b class="font-bold col-cyan">Sudah Lunas/Selesai.</b><br> -->
                            Mohon Periksa Kembali Paramater Inputan Anda, Pastikan Jenis Transaksi Sudah Sesuai!.
                    </p> 
                    <script>
                        swal("TRANSAKSI GAGAL!", "Transaksi Gagal Di Proses, Lihat Keterangan Di Atas !", "error");
                    </script>
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Karena Tahun Angkatan Siswa Tidak Sesuai Dengan Tahun Angkatan Pembayaran'); ?>
            </div>
        <?php
        
        }else{
            //CEK SUDAH BERAPA SISWA MEMBAYAR JENIS TRANSAKSI TERTENTU---------------------------------------
            $cekjumlah  = $db->query("select SUM(jumlah_bayar) AS jumlah 
                                                          FROM transaksi 
                                                          WHERE no_idnt = '$PlhSiswa' 
                                                          AND idJenis_transaksi = '$PlhJnsTrans' ");
            $databayar  = mysqli_fetch_array($cekjumlah);
            $hasilbayar = $databayar['jumlah'] + $JmlByr;
            //------------------------------------------------------------------------------------------------
        
            if($databayar['jumlah'] >= $jenis['kewajiban']){
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
            }elseif($hasilbayar > $jenis['kewajiban']) { ?>
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
            }else{
                $insertTransaksi = $db->query("INSERT INTO transaksi(idTransaksi, idJenis_transaksi, no_transaksi, no_idnt,tgl_transaksi, jam_transaksi, jumlah_bayar, petugas, revisi, ket_transaksi)VALUES('', '$PlhJnsTrans', '$NoTrans1$NoTrans2$NoTrans3', '$PlhSiswa', '$tanggal', '$jam', '$JmlByr', '$session[nama_tampilan]', '0', '$ketTransaksi')") or die ($db->error);

                ?>
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Pembayaran Jenis <strong><?= $jenis['nama_jenis_transaksi'] ?></strong> |  
                    <strong><?= $nama['nama_siswa'] ?></strong> Sebesar <strong>Rp.<?php echo number_format($JmlByr) ?>.-</strong> 
                    Berhasil Di Proses.   
                    <script>swal("Proses Berhasil!", "Transaksi Berhasil Di Proses !", "success");</script>   
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, $deskSukses); ?>
                </div>
            <?php
        }
    }
}

?>   