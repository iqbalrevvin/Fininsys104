<?php
    if(isset($_POST['btnTransaksiMasuk'])){
        date_default_timezone_set('Asia/Jakarta');
        $jmlKasMasuk            = $_POST['jmlKelolaKasMasuk'];
        $tipe                   = 'MASUK';
        $idJnsKas               = $_POST['idJnsKas'];
        $idMasterKas            = $ID;
        $tanggal                = $_POST['tglKelolaKasMasuk'];
        $tglInput               = date("Y-m-d H:i:s");
        $admin                  = $session['nama_tampilan'];
        $noKas                  = "SCI".date("sHd");
        $deskripsi              = @mysqli_real_escape_string($db,$_POST['deskripsi']);

        $addKasKhusus = $db->query("INSERT INTO kas_khusus (idKas_khusus, no_kas, jml_kas_masuk, jml_kas_keluar, tipe_kas, deskripsi, idJenis_kas, idMaster_kas, tgl_kas, tgl_input, petugas, revisi, tgl_revisi) VALUES ('', '$noKas', '$jmlKasMasuk', '0', '$tipe', '$deskripsi', '$idJnsKas', '$idMasterKas', '$tanggal', '$tglInput', '$admin', '0', '')") or die ($db->error);
        echo"<script>history.go(-1);</script>";

        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Kas Masuk Di Kelola Kas Khusus');
    }
?>