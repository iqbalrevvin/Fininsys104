<?php
@session_start();
include "../../../Config/configdb.php";
include "../../../Config/Functions.php";
include "../../../Controller/Session.php";
 if(isset($_POST['editDataPengguna'])){
            $id                     = $_POST['id'];
            $namaAdmin              = $_POST['namaAdmin'];
            #$nikAdmin               = $_POST['nikAdmin'];
            $nipAdmin               = $_POST['nipAdmin'];
            $jkAdmin                = $_POST['jkAdmin'];
            $tmpLahir               = $_POST['tmpLahir'];
            $tglLahirAdmin          = $_POST['tglLahirAdmin'];
            $agamaAdmin             = $_POST['agamaAdmin'];
            $alamatAdmin            = $_POST['alamatAdmin'];
            $desaAdmin              = $_POST['desaAdmin'];
            $kecAdmin               = $_POST['kecAdmin'];
            $kotaAdmin              = $_POST['kotaAdmin'];
            $provAdmin              = $_POST['provAdmin'];
            $hpAdmin                = $_POST['hpAdmin'];
            $emailAdmin             = $_POST['emailAdmin'];

            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

$editDataPengguna = $db->query(" UPDATE admin SET 
                                    nama_admin='$namaAdmin', 
                                    no_induk='$nipAdmin', 
                                    jenis_kelamin='$jkAdmin',
                                    tempat_lahir='$tmpLahir',
                                    tgl_lahir='$tglLahirAdmin',
                                    agama='$agamaAdmin',
                                    alamat='$alamatAdmin',
                                    desa='$desaAdmin',
                                    kecamatan='$kecAdmin',
                                    kabupaten='$kotaAdmin',
                                    provinsi='$provAdmin',
                                    no_telp='$hpAdmin',
                                    email='$emailAdmin' WHERE no_idnt = '$id' ") or die($db->error);

logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Data Pengguna');

}