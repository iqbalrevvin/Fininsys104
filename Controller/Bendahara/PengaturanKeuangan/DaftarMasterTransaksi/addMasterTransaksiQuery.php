<?php
@session_start();
include "../../../../Config/configdb.php";
include "../../../../Config/Functions.php";
include "../../../session.php";
 if(isset($_POST['addMaster'])){

    $namaMasterTransaksi    = $_POST['namaMasterTransaksi'];
    $programStudi           = $_POST['programStudi'];
    $thnAngkatan            = $_POST['thnAngkatan'];

    		//lOG Aktivitas ---------------
            $idUsers    = $session['idUsers'];
            $level      = $session['level'];
            $namaTmpln  = $session['nama_tampilan'];
            $tglAct     = date("Y-m-d");
            $jamAct     = date("H:i:s");
            $tglJamAct  = date("Y-m-d H:i:s");
            //------------------------------------------

    $cekName = $db->query("SELECT * FROM master_transaksi JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan 
                            WHERE nama_master_transaksi = '$namaMasterTransaksi'
                            AND tahun_angkatan ='$thnAngkatan' AND master_transaksi.idJurusan = '$programStudi'") or die($db->error);
    $namaMaster = $cekName->fetch_object();
    $prodi = $namaMaster->nama_jurusan;
    if($cekName->num_rows > 0){ ?>
        <script>
            swal("TAMBAH MASTER TRANSAKSI GAGAL!", "Master Transaksi <?= $namaMasterTransaksi ?> Pada <?= $prodi ?> di Tahun <?= $thnAngkatan ?> Sudah Ada!", "error");
        </script>
        <?php logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Gagal Input Master Transaksi'); 
    }else{
        $insert = mysqli_query($db , "INSERT INTO master_transaksi (idMaster_transaksi, nama_master_transaksi, idJurusan, tahun_angkatan)
                                        VALUES ('', '$namaMasterTransaksi', '$programStudi', '$thnAngkatan')") 
                                        or die ($db->error);
        ?>                               
        <script>
            swal("TAMBAH MASTER TRANSAKSI BERHASIL!", "Master Transaksi <?= $namaMasterTransaksi ?> Berhasil Ditambahakan!", "success");
        </script>
        <?php
        logAct($idUsers, $level, $namaTmpln, $tglAct, $jamAct, $tglJamAct, $mac, 'Input Master Pembayaran');    
    }
 }


?>   