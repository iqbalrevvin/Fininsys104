

<?php 
@session_start();
include "../../../Config/ConfigDB.php";
include "../../../Config/Functions.php";

#if(isset($_POST['tunggakanSelect'])){
$siswa = $_GET['siswa'];
    #$pilihKelas = $_GET['pilihKelas'];

//IDENTIFIKASI SISWA
$cekSiswaQr = $db->query("SELECT * FROM siswa JOIN kelas ON siswa.kelas = kelas.nama_kelas 
                            JOIN prodi ON kelas.idJurusan = prodi.idJurusan
                            JOIN master_transaksi ON prodi.idJurusan = master_transaksi.idJurusan 
                            WHERE siswa.no_idnt = '$siswa' ")
                            or die ($db->error);
$pilihSiswa = $cekSiswaQr->fetch_object();
$Angkatan = angkatan($pilihSiswa->tgl_masuk);
?>
<table class="table table-bordered table-hover table-striped datatable">
<thead>
    <tr>
        <th>Nama</th>
        <th>Tahun</th>
        <th>Master</th>
        <th>Program Studi</th>
        <th>Keterangan</th>
        <th>Kewajiban</th>
    </tr>
</thead>
<tbody>
    <?php 
        include "../../Other/PilihJenisTransaksi.php"; 
        while($pilih = $jenis_transaksi_qr_2->fetch_object()) :
    ?>
        <tr class="pilih" data-jenis="<?= $pilih->idJenis_transaksi ?>" 
            data-namajenis="<?= $pilih->nama_jenis_transaksi ?>">
            <td><b class="col-black"><?= $pilih->nama_jenis_transaksi ?></b></td>
            <td><?= $pilih->tahun_angkatan ?></td>
            <td><?= $pilih->nama_master_transaksi ?></td>
            <td><?= $pilih->nama_jurusan ?></td>
            <td class="font-11"><?= $pilih->keterangan_transaksi ?></td>
            <td>Rp.<?= number_format($pilih->kewajiban) ?>.-</td>
        </tr>
    <?php endwhile; ?>
</tbody>
</table>
<script type="text/javascript">
    $('.datatable').DataTable();
</script>




