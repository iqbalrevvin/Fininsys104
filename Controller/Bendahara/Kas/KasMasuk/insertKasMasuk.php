<?php

@session_start();

include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../Session.php";

    if(isset($_POST['addKasMsk'])){
        date_default_timezone_set('Asia/Jakarta');
        $jmlKasMasuk            = $_POST['jmlKasMasuk'];
        $tipe                   = 'MASUK';
        $idJnsKas               = $_POST['idJnsKas'];
        $tanggal                = $_POST['tglKasMasuk'];
        $tglInput               = date("Y-m-d H:i:s");
        $admin                  = $session['nama_tampilan'];
        $noKas                  = "CI".date("His");
        $deskripsi              = $_POST['deskripsi'];
        //lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = $tanggal;
        $jamAct     = date("H:i:s");
        $tglJamAct  = $tglInput;
        //------------------------------------------

        $addKas = $db->query("INSERT INTO kas (idKas, no_kas, jml_kas_masuk, jml_kas_keluar, tipe_kas, deskripsi, idJenis_kas, tgl_kas, tgl_input, petugas, revisi, tgl_revisi) VALUES ('', '$noKas', '$jmlKasMasuk', '0', '$tipe', '$deskripsi', '$idJnsKas', '$tanggal', '$tglInput', '$admin', '0', '')") or die ($db->error);
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Kas Masuk');
    }