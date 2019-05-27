<?php
@session_start();
include "../../../../Config/Configdb.php";
include "../../../../Config/Functions.php";
include "../../../../Controller/Session.php";
      
if(isset($_POST['editDataSekolah'])){

      $idSekolah          = '1';
      $editNamaSekolah    =$_POST['editNamaSekolah'];
      $editNamaYayasan    =$_POST['editNamaYayasan'];
      $editNPSN           =$_POST['editNPSN'];
      $editAkreditasi     =$_POST['editAkreditasi']; 
      $editSKAkreditasi   =$_POST['editSKAkreditasi'];
      $editJenjang        =$_POST['editJenjang'];
      $editTahunBerdiri   =$_POST['editTahunBerdiri'];
      $editProvSekolah    =$_POST['editProvSekolah'];
      $editKabSekolah     =$_POST['editKabSekolah'];
      $editKecSekolah     =$_POST['editKecSekolah'];
      $editDesaSekolah    =$_POST['editDesaSekolah'];
      $editKodePos        =$_POST['editKodePos'];
      $editAlamatSekolah  =$_POST['editAlamatSekolah'];
      $editEmailSekolah   =$_POST['editEmailSekolah'];
      $editHpSekolah      =$_POST['editHpSekolah'];
      $editEmailSekolah   =$_POST['editEmailSekolah'];
      $editWebSekolah     =$_POST['editWebSekolah'];

      //lOG Aktivitas ---------------
      $idUsers    = $session['idUsers'];
      $level      = $session['level'];
      $namaTmpln  = $session['nama_tampilan'];
      $tglAct     = date("Y-m-d");
      $jamAct     = date("H:i:s");
      $tglJamAct  = date("Y-m-d H:i:s");
      //------------------------------------------


      $updateAdmin        = mysqli_query($db, "UPDATE sekolah SET nama_yayasan        = '$editNamaYayasan',
                                                                        nama_sekolah        = '$editNamaSekolah',
                                                                        npsn                = '$editNPSN',
                                                                        akreditasi          = '$editAkreditasi',
                                                                        no_sk_akreditasi    = '$editSKAkreditasi',
                                                                        jenjang             = '$editJenjang',
                                                                        tahun_berdiri       = '$editTahunBerdiri',
                                                                        provinsi_sekolah    = '$editProvSekolah',
                                                                        kabupaten_sekolah   = '$editKabSekolah',
                                                                        kecamatan_sekolah   = '$editKecSekolah',
                                                                        desa_sekolah        = '$editDesaSekolah',
                                                                        kode_pos            = '$editKodePos',
                                                                        alamat_sekolah      = '$editAlamatSekolah',
                                                                        email_sekolah       = '$editEmailSekolah',
                                                                        telp_sekolah        = '$editHpSekolah',
                                                                        website_sekolah     =  '$editWebSekolah'
                                                                        WHERE idSekolah='$idSekolah' ") or die ($db->error);

            logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Data Sekolah');
                                                                                                                                                                                                                                                             }
?>