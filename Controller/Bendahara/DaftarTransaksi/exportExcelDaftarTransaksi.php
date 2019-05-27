<?php
require('../../../Config/Functions.php');
require('../../../Config/ConfigDB.php');

$sql = "SELECT * FROM siswa JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
			JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
			JOIN kelas ON siswa.kelas = kelas.nama_kelas
			JOIN prodi on kelas.idJurusan = prodi.idJurusan
			ORDER BY transaksi.tgl_transaksi DESC, siswa.nama_siswa ASC";
#$sql = "SELECT transaksi JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
#		JOIN siswa ON transaksi.no_idnt = siswa.no_idnt 
#		JOIN kelas ON siswa.kelas = kelas.nama_kelas
#		JOIN prodi on kelas.idJurusan = prodi.idJurusan
#		ORDER BY transaksi.tgl_transaksi DESC, siswa.nama_siswa ASC";
$excecution = $db->query($sql) or die ($db->error);

$date 		= date('dmYhHis');
$namaFile 	= "Fininsys_daftar_transaksi-$date.xls";
$headerJudul = "Data Transaksi Pembayaran";
$headerKeterangan = "Jika Tampil -PROTECTED VIEW-, Klik Enable Editing Atau Lakukan Pengaturan pada POLICY SETTINGS di Aplikasi Excel Anda Untuk Dapat Mengelola Data!";

//baris berapa header tabel di tulis
$tablehead = 3;
//baris berapa data mulai di tulis
$tablebody = 4;
//no urut data
$nourut = 1;

//penulisan header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=".$namaFile."");
header("Content-Transfer-Encoding: binary ");

xlsBOF();
xlsWriteLabel(0,0,$headerJudul);
xlsWriteLabel(1,0,$headerKeterangan);


$kolomhead = 0;
xlsWriteLabel($tablehead,$kolomhead++,"NO");              
xlsWriteLabel($tablehead,$kolomhead++,"NAMA SISWA");             
xlsWriteLabel($tablehead,$kolomhead++,"NIPD");
xlsWriteLabel($tablehead,$kolomhead++,"NO. IDENTITAS");
xlsWriteLabel($tablehead,$kolomhead++,"ANGKATAN");
xlsWriteLabel($tablehead,$kolomhead++,"KELAS");
xlsWriteLabel($tablehead,$kolomhead++,"NO. TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"JENIS TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"TANGGAL TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"JAM TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH PEMBAYARAN");
xlsWriteLabel($tablehead,$kolomhead++,"PETUGAS");
xlsWriteLabel($tablehead,$kolomhead++,"JML REVISI");
xlsWriteLabel($tablehead,$kolomhead++,"KETERANGAN");

while($data = $excecution->fetch_object()):
	$tingkat = grade($data->tgl_masuk, $data->jumlah_semester);

	$kolombody = 0;
	xlsWriteNumber($tablebody,$kolombody++,$nourut);
	xlsWriteLabel($tablebody,$kolombody++,$data->nama_siswa);
	xlsWriteLabel($tablebody,$kolombody++,$data->nipd);
	xlsWriteLabel($tablebody,$kolombody++,$data->no_idnt);
	xlsWriteLabel($tablebody,$kolombody++,angkatan($data->tgl_masuk));
	xlsWriteLabel($tablebody,$kolombody++,$data->nama_kelas);
	xlsWriteLabel($tablebody,$kolombody++,$data->no_transaksi);
	xlsWriteLabel($tablebody,$kolombody++,$data->nama_jenis_transaksi);
	xlsWriteLabel($tablebody,$kolombody++,$data->tgl_transaksi);
	xlsWriteLabel($tablebody,$kolombody++,$data->jam_transaksi);
	xlsWriteNumber($tablebody,$kolombody++,$data->jumlah_bayar);
	xlsWriteLabel($tablebody,$kolombody++,$data->petugas);
	xlsWriteLabel($tablebody,$kolombody++,$data->revisi);
	xlsWriteLabel($tablebody,$kolombody++,$data->ket_transaksi);
	$tablebody++;
	$nourut++;

endwhile;

xlsEOF();
exit();
?>