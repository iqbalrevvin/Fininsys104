<?php

@session_start();

include "../../../../server/configdb.php";
include "../../../session.php";

    if(isset($_POST['editKasKlr'])){
        date_default_timezone_set('Asia/Jakarta');
        $id                     = $_POST['id'];               
        $jmlKasKeluar            = $_POST['jmlKasKeluar'];
        $idJnsKas               = $_POST['idJnsKas'];
        $tanggal                = $_POST['tglKasKeluar'];
        $tglInput               = date("Y-m-d H:i:s");
        $tglRevisi              = date("Y-m-d H:i:s");
        $admin                  = $session['nama_tampilan'];
        $deskripsi              = $_POST['deskripsi'];
        $revisiQ                = $db->query(" SELECT revisi FROM kas WHERE idKas = '$id' ") or die ($db->error);
        $cekRevisi              = $revisiQ->fetch_array();
        $revisi                 = $cekRevisi['revisi'] + 1;


        $updateKas = $db->query(" UPDATE kas SET jml_kas_keluar = '$jmlKasKeluar', deskripsi = '$deskripsi', 
                                                 idJenis_kas = '$idJnsKas', tgl_kas = '$tanggal', tgl_input = '$tglInput',
                                                 petugas = '$admin', revisi = '$revisi', tgl_revisi = '$tglRevisi'
                                        WHERE idKas = '$id' ") or die ($db->error);
    }