<?php
@session_start();
include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../session.php";
	
	if(isset($_POST['editAdmin'])){

            $idAdmin            =$_POST['idAdmin'];
            $editNamaAdmin      =$_POST['editNamaAdmin'];
            $editJenisKelamin   =$_POST['editJenisKelamin'];
            $editNikAdmin       =$_POST['editNikAdmin'];
            $editNipAdmin       =$_POST['editNipAdmin'];
            $editTmpLahirAdmin  =$_POST['editTmpLahirAdmin']; 
            $editTglLahirAdmin  =$_POST['editTglLahirAdmin'];
            $editAgamaAdmin     =$_POST['editAgamaAdmin'];
            $editAlamatAdmin    =$_POST['editAlamatAdmin'];
            $editDesaAdmin      =$_POST['editDesaAdmin'];
            $editKecAdmin       =$_POST['editKecAdmin'];
            $editKotaAdmin      =$_POST['editKotaAdmin'];
            $editProvAdmin      =$_POST['editProvAdmin'];
            $editHpAdmin        =$_POST['editHpAdmin'];
            $editEmailAdmin     =$_POST['editEmailAdmin'];

            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

            $updateAdmin        = mysqli_query($db, "UPDATE admin SET 
                                        nama_admin = '$editNamaAdmin', no_idnt = '$editNikAdmin', no_induk = '$editNipAdmin',
                                        jenis_kelamin = '$editJenisKelamin', tempat_lahir = '$editJenisKelamin', 
                                        tempat_lahir = '$editTmpLahirAdmin', tgl_lahir = '$editTglLahirAdmin', 
                                        agama = '$editAgamaAdmin', alamat = '$editAlamatAdmin', desa = '$editDesaAdmin',
                                        kecamatan = '$editKecAdmin', kabupaten = '$editKotaAdmin', provinsi = '$editProvAdmin',
                                        no_telp = '$editHpAdmin', email = '$editEmailAdmin' WHERE idAdmin='$idAdmin' ") or die ($db->error);

            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Biodata '.$editNamaAdmin.'');
	                                                                                                                                                                                                                                                       }
?>