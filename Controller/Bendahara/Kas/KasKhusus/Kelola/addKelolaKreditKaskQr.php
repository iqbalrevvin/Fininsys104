<?php
    if(isset($_POST['btnTransaksiKeluar'])){
        date_default_timezone_set('Asia/Jakarta');
        $jmlKasKeluar            = $_POST['jmlKelolaKasKeluar'];
        $tipe                   = 'KELUAR';
        $idJnsKas               = $_POST['idJnsKas'];
        $idMasterKas            = $ID;
        $tanggal                = $_POST['tglKelolaKasKeluar'];
        $tglInput               = date("Y-m-d H:i:s");
        $admin                  = $session['nama_tampilan'];
        $noKas                  = "SCO".date("sHd");
        $deskripsi              = @mysqli_real_escape_string($db,$_POST['deskripsi']);

        $addKasKhusus = $db->query("INSERT INTO kas_khusus (idKas_khusus, no_kas, jml_kas_masuk, jml_kas_keluar, tipe_kas, deskripsi, idJenis_kas, idMaster_kas, tgl_kas, tgl_input, petugas, revisi, tgl_revisi) VALUES ('', '$noKas', '0', '$jmlKasKeluar', '$tipe', '$deskripsi', '$idJnsKas', '$idMasterKas', '$tanggal', '$tglInput', '$admin', '0', '')") or die ($db->error);
        echo"<script>history.go(-1);</script>";

        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Kas Keluar Di Kelola Kas Khusus');
    }
?>