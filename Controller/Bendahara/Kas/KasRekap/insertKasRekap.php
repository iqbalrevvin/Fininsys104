<?php

@session_start();

include "../../../../server/configdb.php";
include "../../../../server/Functions.php";
include "../../../session.php";

    if(isset($_POST['addKasKlr'])){
        date_default_timezone_set('Asia/Jakarta');
        $jmlKasKeluar            = $_POST['jmlKasKeluar'];
        $tipe                   = 'KELUAR';
        $idJnsKas               = $_POST['idJnsKas'];
        $tanggal                = $_POST['tglKasKeluar'];
        $tglInput               = date("Y-m-d H:i:s");
        $admin                  = $session['nama_tampilan'];
        $noKas                  = "CO".date("His");
        $deskripsi              = $_POST['deskripsi'];
            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

        $addKas = $db->query("INSERT INTO kas (idKas, no_kas, jml_kas_masuk, jml_kas_keluar, tipe_kas, deskripsi, idJenis_kas, tgl_kas, tgl_input, petugas, revisi, tgl_revisi) VALUES ('', '$noKas', '0', '$jmlKasKeluar', '$tipe', '$deskripsi', '$idJnsKas', '$tanggal', '$tglInput', '$admin', '0', '')") or die ($db->error);
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Rekapitulasi Kas');
    }