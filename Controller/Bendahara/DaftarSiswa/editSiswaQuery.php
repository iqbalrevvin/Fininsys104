<?php
@session_start();
include "../../../Config/configdb.php";
include "../../../Config/Functions.php";
include "../../session.php";

#include "../session.php";
	if(isset($_POST['editSiswa'])){

		$id 				= $_POST['idSiswa'];
		$editNamaSiswa      = $_POST['editNamaSiswa'];
        $editJenisKelamin   = $_POST['editJenisKelamin'];
        $editNikSiswa       = $_POST['editNikSiswa'];
        $editNisnSiswa      = $_POST['editNisnSiswa'];
        $editNipdSiswa      = $_POST['editNipdSiswa'];
        $editStatusPindah   = $_POST['editStatusPindah'];
        $editTglPindahSiswa = $_POST['editTglPindahSiswa'];
        $editPindahSemester = $_POST['editPindahSemester'];
        $editTglMasukSiswa  = $_POST['editTglMasukSiswa'];
        $editProdiSiswa     = $_POST['editProdiSiswa'];
        $editTmpLahirSiswa  = $_POST['editTmpLahirSiswa']; 
        $editTglLahirSiswa  = $_POST['editTglLahirSiswa'];
        $editAgamaSiswa     = $_POST['editAgamaSiswa'];
        $editAlamatSiswa    = $_POST['editAlamatSiswa'];
        $editDesaSiswa      = $_POST['editDesaSiswa'];
        $editKecSiswa       = $_POST['editKecSiswa'];
        $editKotaSiswa      = $_POST['editKotaSiswa'];
        $editProvSiswa      = $_POST['editProvSiswa'];
        $editHpSiswa        = $_POST['editHpSiswa'];
        $editEmailSiswa     = $_POST['editEmailSiswa'];
        $editPipSiswa       = $_POST['editPipSiswa'];
        $editNamaAyah       = $_POST['editNamaAyah'];
        $editThnLhrAyah     = $_POST['editThnLhrAyah'];
        $editPendAyah       = $_POST['editPendAyah'];
        $editPkjAyah        = $_POST['editPkjAyah'];
        $editPengAyah       = $_POST['editPengAyah'];
        $editNamaIbu        = $_POST['editNamaIbu'];
        $editThnLhrIbu      = $_POST['editThnLhrIbu'];
        $editPendIbu        = $_POST['editPendIbu'];
        $editPkjIbu         = $_POST['editPkjIbu'];
        $editPengIbu        = $_POST['editPengIbu'];
        //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------


    $updateSiswa 	= mysqli_query($db, "UPDATE siswa SET 
                                        nama_siswa='$editNamaSiswa', jenis_kelamin='$editJenisKelamin', 
                                        no_idnt='$editNikSiswa', nisn='$editNisnSiswa', nipd='$editNipdSiswa', pindahan='$editStatusPindah',
                                        tgl_pindah='$editTglPindahSiswa', pindah_di_semester='$editPindahSemester', 
                                        tgl_masuk='$editTglMasukSiswa',  kelas='$editProdiSiswa', tempat_lahir='$editTmpLahirSiswa', 
                                        tgl_lahir='$editTglLahirSiswa', agama='$editAgamaSiswa', 
                                        alamat='$editAlamatSiswa', desa='$editDesaSiswa', kecamatan='$editKecSiswa', kabupaten='$editKotaSiswa', 
                                        provinsi='$editProvSiswa', no_telp='$editHpSiswa', email='$editEmailSiswa', pip='$editPipSiswa', 
                                        nama_ayah='$editNamaAyah', tahun_lahir_ayah='$editThnLhrAyah', pendidikan_ayah='$editPendIbu',
                                        pekerjaan_ayah='$editPkjAyah', penghasilan_ayah='$editPengAyah', nama_ibu='$editNamaIbu', 
                                        tahun_lahir_ibu='$editThnLhrIbu', pendidikan_ibu='$editPendIbu', pekerjaan_ibu='$editPkjIbu',
                                        penghasilan_ibu='$editPengIbu' WHERE idSiswa='$id' ") or die ($db->error);

	logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Data Siswa');
    //$updateSiswa 	= mysqli_query($db, "UPDATE siswa SET nama_siswa='$editNamaSiswa', jenis_kelamin='$editJenisKelamin', no_idnt='$editNikSiswa', nisn='$editNisnSiswa', nipd='$editNipdSiswa', pindahan='$editStatusPindah', tgl_pindah='$editTglPindahSiswa', pindah_di_semester='$editPindahSemester', tgl_masuk='$editTglMasukSiswa', prodi='$editProdiSiswa', tempat_lahir='$editTmpLahirSiswa', tgl_lahir='$editTglLahirSiswa', agama='$editAgamaSiswa', alamat='$editAlamatSiswa', desa='$editDesaSiswa', kecamatan='$editKecSiswa', kabupaten='$editKotaSiswa', provinsi='$editProvSiswa', no_telp='$editHpSiswa', email='$editEmailSiswa', pip='$editPipSiswa' WHERE idSiswa='$id' ") or die ($db->error);
	}
?>