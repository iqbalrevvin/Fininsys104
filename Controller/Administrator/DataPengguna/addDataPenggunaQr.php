<?php
@session_start();
include "../../../Config/configdb.php";
include "../../../Config/Functions.php";
include "../../../Controller/Session.php";
 if(isset($_POST['addPengguna'])){
        	$namaAdmin              = $_POST['namaAdmin'];
            $nikAdmin               = $_POST['nikAdmin'];
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
        //$JmlByr         = @mysqli_real_escape_string($db, $_POST['txt_JmlByr']);

            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

$insertDataPengguna = $db->query("INSERT INTO admin (idAdmin, nama_admin, no_idnt, no_induk, jenis_kelamin, tempat_lahir, tgl_lahir, 
                                                     agama, alamat, desa, kecamatan, kabupaten, provinsi, no_telp, email)
                                  VALUES ('', '$namaAdmin', '$nikAdmin', '$nipAdmin', '$jkAdmin', '$tmpLahir', '$tglLahirAdmin', 
                                                  '$agamaAdmin', '$alamatAdmin', '$desaAdmin', '$kecAdmin', '$kotaAdmin', '$provAdmin', 
                                                  '$hpAdmin', '$emailAdmin')") or die ($db->error);
$insertAkunPenggua = $db->query("INSERT INTO users(idUsers, no_idnt,  nama_tampilan, username, password, pass, foto, level, status, online)
                                    VALUES('', '$nikAdmin', '$namaAdmin', '$nikAdmin', md5('$nikAdmin'), '$nikAdmin', '', '3', 'nonaktif', 'off' )")
                                    or die ($db->error);
logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Tambah Data Pengguna');

 }


?>   