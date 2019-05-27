<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
$date 		= date('dmYhHis');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_transaksi_pembayaran-".$date.".xls");
header("Content-Transfer-Encoding: binary");
?>

<h3>DATA TRANSAKSI PEMBAYARAN SISWA</h3>
		
<table border="1" cellpadding="5">
	<tr>
		<th><b>No</b></th>
		<th><b>NAMA</b></th>
		<th><b>NIPD</b></th>
		<th><b>NO IDENTITAS</b></th>
		<th><b>TINGKAT</b></th>
		<th><b>KELAS</b></th>
		<th><b>NO. TRANSAKSI</b></th>
		<th><b>JENIS TRANSAKSI</b></th>
		<th><b>TANGGAL TRANSAKSI</b></th>
		<th><b>JAM TRANSAKSI</b></th>
		<th><b>JUMLAH PEMBAYARAN</b></th>
		<th><b>PETUGAS</b></th>
		<th><b>JML REVISI</b></th>
		<th><b>KETERANNGAN</b></th>
	</tr>

<?php 
	require('../../../Config/Functions.php');
	require('../../../Config/ConfigDB.php');

	$sql = "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
			JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
			JOIN kelas ON siswa.kelas = kelas.nama_kelas
			JOIN prodi on kelas.idJurusan = prodi.idJurusan
			ORDER BY transaksi.tgl_transaksi DESC, siswa.nama_siswa ASC";
	$excecution = $db->query($sql) or die ($db->error);
	$no = 1;
	while($data = $excecution->fetch_object()):
		$tingkat = grade($data->tgl_masuk, $data->jumlah_semester);
?>
	<tr>
		<td><?= $no++ ?></td>
		<td><?= $data->nama_siswa ?></td>
		<td><?= $data->nipd ?></td>
		<td><?= $data->no_idnt ?></td>
		<td><?= $tingkat ?></td>
		<td><?= $data->nama_kelas ?></td>
		<td><?= $data->no_transaksi ?></td>
		<td><?= $data->nama_jenis_transaksi ?></td>
		<td><?= $data->tgl_transaksi ?></td>
		<td><?= $data->jam_transaksi ?></td>
		<td><?= $data->jumlah_bayar ?></td>
		<td><?= $data->petugas ?></td>
		<td><?= $data->revisi ?></td>
		<td><?= $data->ket_transaksi ?></td>
	</tr>

<?php endwhile; ?>
</table>
