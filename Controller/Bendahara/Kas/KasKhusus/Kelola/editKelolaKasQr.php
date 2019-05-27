<?php
@session_start();
include "../../../../../Config/ConfigDB.php";
include "../../../../../Config/Functions.php";
include "../../../../Session.php";
    
    if(isset($_POST['editKelolaKas'])){
        date_default_timezone_set('Asia/Jakarta');
        $id                 = $_POST['id'];
        $idMasterKas        =$_POST['idMasterKas'];
        $namaMaster         =$_POST['namaMaster'];
        $idJnsKasKelola     =$_POST['idJnsKasKelola'];
        $tanggal            =$_POST['tglKasKelola'];
        $jmlKelolaMasuk     =$_POST['jmlKelolaMasuk'];
        $jmlKelolaKeluar    =$_POST['jmlKelolaKeluar'];
        $deskripsi          =$_POST['deskripsi'];
        $noKasMasuk         = "SCI".date("sHd");
        $noKasKeluar        = "SCO".date("sHd");
        $tglInput           = date("Y-m-d H:i:s");
        $petugas            = $session['nama_tampilan'];
        //Identifikasi Revisi
        $transaksi          = $db->query("SELECT revisi, idKas_khusus FROM kas_khusus WHERE idKas_khusus='$id'") or die ($db->error);
        $revisi             = $transaksi->fetch_array();
        $rev                = $revisi['revisi'] + 1;
        $cekJenisKas        = $db->query("SELECT tipe_kas FROM jenis_kas WHERE idJenis_kas='$idJnsKasKelola'") or die ($db->error);
        $cekJK              = $cekJenisKas->fetch_array();
        $tipeKas           = $cekJK['tipe_kas'];  

            //lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------   

        if($jmlKelolaMasuk > '0') {
            if($tipeKas=='MASUK'){   
                $UpdKasMasuk = $db->query("UPDATE kas_khusus set no_kas         ='$noKasMasuk', 
                                                                 jml_kas_masuk  ='$jmlKelolaMasuk',
                                                                 jml_kas_keluar ='0',
                                                                 tipe_kas       ='MASUK',
                                                                 deskripsi      ='$deskripsi',
                                                                 idJenis_kas    ='$idJnsKasKelola',
                                                                 tgl_kas        ='$tanggal',
                                                                 petugas        ='$petugas',
                                                                 revisi         ='$rev',
                                                                 tgl_revisi     ='$tglInput'
                                                                 WHERE idKas_khusus = '$id' 
                                                                 AND idMaster_kas = '$idMasterKas'") or die ($db->error);

                    ?><script>swal("Berhasil", "Kas Berhasil Di Perbarui", "success");</script><?php
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Transaksi Kas Di Kelola Kas Khusus');
            }else{
                    ?><script>swal("Error", "Sumber Kas Harus Berjenis Kas Masuk!", "error");</script><?php
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Edit Transaksi Kelola Kas Khusus Dikarenakan Salah Memilih Sumber Kas');
                }
        ?>

       <?php
        }elseif($jmlKelolaKeluar > '0'){
            if($tipeKas=='KELUAR'){ 
                $UpdKasKeluar = $db->query("UPDATE kas_khusus set no_kas         ='$noKasKeluar', 
                                                                  jml_kas_masuk  ='0',
                                                                  jml_kas_keluar ='$jmlKelolaKeluar',
                                                                  tipe_kas       ='KELUAR',
                                                                  deskripsi      ='$deskripsi',
                                                                  idJenis_kas    ='$idJnsKasKelola',
                                                                  tgl_kas        ='$tanggal',
                                                                  petugas        ='$petugas',
                                                                  revisi         ='$rev',
                                                                  tgl_revisi     ='$tglInput'
                                                                WHERE idKas_khusus = '$id' 
                                                                AND idMaster_kas = '$idMasterKas'") or die ($db->error);

                    ?><script>swal("Berhasil", "Kas Berhasil Di Perbarui", "success");</script><?php
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Edit Transaksi Kas Di Kelola Kas Khusus');
            }else{
                    ?><script>swal("Error", "Sumber Kas Harus Berjenis Kas Keluar!", "error");</script><?php
                    logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Edit Transaksi Kelola Kas Khusus Dikarenakan Salah Memilih Sumber Kas');
            }
        }
    }
?>