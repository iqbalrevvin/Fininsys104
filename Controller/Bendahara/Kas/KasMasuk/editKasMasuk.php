<?php

@session_start();

include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../session.php";

    if(isset($_POST['editKasMsk'])){
        date_default_timezone_set('Asia/Jakarta');
        $id                     = $_POST['id'];               
        $jmlKasMasuk            = $_POST['jmlKasMasuk'];
        $idJnsKas               = $_POST['idJnsKas'];
        $tanggal                = $_POST['tglKasMasuk'];
        $tglInput               = date("Y-m-d H:i:s");
        $tglRevisi              = date("Y-m-d H:i:s");
        $admin                  = $session['nama_tampilan'];
        $deskripsi              = @mysqli_real_escape_string($db, $_POST['deskripsi']);
        $revisiQ                = $db->query(" SELECT revisi FROM kas WHERE idKas = '$id' ") or die ($db->error);
        $cekRevisi              = $revisiQ->fetch_array();
        $revisi                 = $cekRevisi['revisi'] + 1;
        //lOG Aktivitas ---------------
        $idUsers    = $session['idUsers'];
        $level      = $session['level'];
        $namaTmpln  = $session['nama_tampilan'];
        $tglAct     = $tanggal;
        $jamAct     = date("H:i:s");
        $tglJamAct  = $tglInput;
        //------------------------------------------


        $updateKas = $db->query(" UPDATE kas SET jml_kas_masuk = '$jmlKasMasuk', deskripsi = '$deskripsi', 
                                                 idJenis_kas = '$idJnsKas', tgl_kas = '$tanggal', tgl_input = '$tglInput',
                                                 petugas = '$admin', revisi = '$revisi', tgl_revisi = '$tglRevisi'
                                        WHERE idKas = '$id' ") or die ($db->error);
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Kas Masuk');
    }