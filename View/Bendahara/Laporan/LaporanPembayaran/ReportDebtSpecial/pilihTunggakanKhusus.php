<?php 
    $pilihAngkatan = $_GET['pilihAngkatan'];
    $pilihKelas     = $_GET['pilihKelas'];
?>
<select name="jnsTunggakan" class="form-control show-tick selectpicker" data-live-search="true" required>
    <option value="">-- Jenis Tunggakan --</option>
    <option value="semuaTunggakan">Semua Tunggakan</option>
        <?php 
        require_once('../../../../../Controller/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/pilihTunggakanKhusus.php');

        $jenisTransaksi = $selectReport->pilihTunggakan($pilihAngkatan, $pilihKelas);  

        while($JnsTrans = mysqli_fetch_object($jenisTransaksi)):
            echo "<option value='$JnsTrans->idJenis_transaksi' data-subtext=' | $JnsTrans->tahun_angkatan'>
                    $JnsTrans->nama_jenis_transaksi | $JnsTrans->nama_master_transaksi
              </option> ";     
        endwhile;                         
        ?>
</select>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
  size: 4
    });
</script>



