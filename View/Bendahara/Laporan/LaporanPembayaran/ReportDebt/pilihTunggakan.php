<?php 
include "../../../../../Config/ConfigDB.php"; 

#if(isset($_POST['tunggakanSelect'])){
$pilihAngkatan = $_GET['pilihAngkatan'];
$pilihKelas     = $_GET['pilihKelas'];
    #$pilihKelas = $_GET['pilihKelas'];
?>
<select name="jnsTunggakan" class="form-control show-tick selectpicker" data-live-search="true" required>
<option value="">-- Jenis Tunggakan --</option>
<option value="semuaTunggakan">Semua Tunggakan</option>
    <?php 
        $cekProdi = $db->query("SELECT * FROM kelas WHERE nama_kelas = '$pilihKelas'") or die ($db->error);
        $kelas = $cekProdi->fetch_object();
        $jenis_transaksi_qr = $db->query("SELECT * FROM jenis_transaksi JOIN master_transaksi
                                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                                            JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
                                            WHERE master_transaksi.tahun_angkatan = '$pilihAngkatan'
                                            AND master_transaksi.idJurusan = '$kelas->idJurusan'
                                            AND jenis_transaksi.tipe_jenis_transaksi = 'REGULER'") or die ($db->error);
        while($JnsTrans = mysqli_fetch_array($jenis_transaksi_qr)){
            echo "  <option value='$JnsTrans[idJenis_transaksi]' data-subtext=' | $JnsTrans[tahun_angkatan] '>
                        $JnsTrans[nama_jenis_transaksi] | $JnsTrans[nama_master_transaksi]
                    </option> "; 
                }   
            #}   
    ?>
</select>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
  size: 4
    });
</script>



