<?php
@session_start();
include "../../../Config/configdb.php";
include "../../../Config/Functions.php";
include "../../session.php";
 if(isset($_POST['addSiswa'])){
        	$namaSiswa      = $_POST['namaSiswa'];
            $jnsKelamin     = $_POST['jeniskelamin'];
            $nikSiswa       = $_POST['nikSiswa'];
            $nisnSiswa      = $_POST['nisnSiswa'];
            $nipdSiswa      = $_POST['nipdSiswa'];
            $tglMasukSiswa  = $_POST['tglMasukSiswa'];
            $prodiSiswa     = $_POST['prodiSiswa'];
            $tmpLahirSiswa  = $_POST['tmpLahirSiswa'];
            $tglLahirSiswa  = $_POST['tglLahirSiswa'];
            $agamaSiswa     = $_POST['agamaSiswa'];
            $alamatSiswa    = $_POST['alamatSiswa'];
            $desaSiswa      = $_POST['desaSiswa'];
            $kecSiswa       = $_POST['kecSiswa'];
            $kotaSiswa      = $_POST['kotaSiswa'];
            $provSiswa      = $_POST['provSiswa'];
            $hpSiswa        = $_POST['hpSiswa'];
            $emailSiswa     = $_POST['emailSiswa'];
            $pipSiswa       = $_POST['pipSiswa'];
        //$JmlByr         = @mysqli_real_escape_string($db, $_POST['txt_JmlByr']);
            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

        $insert = $db->query("INSERT INTO siswa (idSiswa, no_idnt, tgl_masuk, kelas, nama_siswa, jenis_kelamin, nisn, nipd, tempat_lahir, tgl_lahir, agama, alamat, desa, kecamatan, kabupaten, provinsi, no_telp, email, pip)
                                        VALUES ('', '$nikSiswa', '$tglMasukSiswa', '$prodiSiswa', '$namaSiswa', '$jnsKelamin', '$nisnSiswa', '$nipdSiswa', '$tmpLahirSiswa','$tglLahirSiswa', '$agamaSIswa'
                                            , '$alamatSiswa', '$desaSiswa', '$kecSiswa', '$kotaSiswa','$provSiswa'
                                            , '$hpSiswa', '$emailSiswa', '$pipSiswa')") 
                                        or die ($db->error);
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Data Siswa');
echo '<script>alert("Input Berhasil");</script>';

 }


?>   