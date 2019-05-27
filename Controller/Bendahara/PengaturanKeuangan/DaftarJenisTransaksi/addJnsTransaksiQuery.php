<?php
@session_start();
include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../session.php";
 if(isset($_POST['addJenis'])){

            $idMasterTrans          = $_POST['idMasterTrans'];
        	$kdTransaksi            = $_POST['kdTransaksi'];
            $namaTransaksi          = $_POST['namaTransaksi'];
            $semesterTransaksi      = $_POST['semesterTransaksi'];
            $kewajiban              = $_POST['kewajiban'];
            $keteranganTransaksi    = $_POST['keteranganTransaksi'];
            $tipeJenisTransaksi     = $_POST['tipeJenisTransaksi'];


            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------
            
        //$JmlByr         = @mysqli_real_escape_string($db, $_POST['txt_JmlByr']);
        $cekDataJenisTransaksi = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi 
                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                            WHERE jenis_transaksi.nama_jenis_transaksi = '$namaTransaksi' 
                            AND jenis_transaksi.idMaster_transaksi = '$idMasterTrans' ") or die ($db->error);
        $data = mysqli_fetch_array($cekDataJenisTransaksi);
        if($cekDataJenisTransaksi->num_rows > 0) {
            ?>
            <div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p> Nama Jenis Transaksi <strong><?= $namaTransaksi ?></strong> 
                    Di Tahun <?= $data['tahun_angkatan'] ?></strong> Sudah Ada<br> 
                        <!--<b class="font-bold col-cyan">Sudah Lunas/Selesai.</b><br> -->
                            Mohon Periksa Kembali Paramater Inputan Anda, Pastikan Jenis Transaksi Sudah Sesuai!.
                    </p> 
                    <script>
                        swal("TAMBAH JENIS TRANSAKSI GAGAL!", "Nama Jenis Transaksi <?= $namaTransaksi ?> Di Tahun <?= $data['tahun_angkatan'] ?> Sudah Ada", "error");
                    </script>
                    <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Input Jenis Transaksi'); ?>
            </div>
        <?php }else{ ?>
                    <script>
                        swal("TAMBAH JENIS TRANSAKSI BERHASIL!", "Penambahan Data Berhasil Di Proses !", "success");
                    </script>
                    <?php
        $insert = mysqli_query($db , "INSERT INTO jenis_transaksi 
                                            (idJenis_transaksi, idMaster_transaksi, kd_transaksi, tipe_jenis_transaksi, nama_jenis_transaksi, set_semester, kewajiban, keterangan_transaksi)
                                        VALUES ('', '$idMasterTrans', '$kdTransaksi', '$tipeJenisTransaksi', '$namaTransaksi', '$semesterTransaksi', '$kewajiban', '$keteranganTransaksi')") 
                                        or die ($db->error);
logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Jenis Pembayaran');
}

 }


?>   