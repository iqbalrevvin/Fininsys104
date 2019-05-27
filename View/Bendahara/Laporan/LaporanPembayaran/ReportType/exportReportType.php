<?php 
//memanggil fungsi
include '../../../../../Config/Functions.php';
include '../../../../../Config/ConfigDB.php';
$jnsTransaksi 		=$_GET['TT'];
$FromDate 	= $_GET['FD'];
$EndDate 	= $_GET['ED'];
//koneksi ke database dan jalankan query

$result = $db->query("SELECT * FROM siswa JOIN kelas ON kelas.nama_kelas = siswa.kelas
    								JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
    								JOIN transaksi ON siswa.no_idnt = transaksi.no_idnt
                                    JOIN jenis_transaksi ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                                    JOIN master_transaksi ON jenis_transaksi.idMaster_transaksi=master_transaksi.idMaster_transaksi 
                                    WHERE transaksi.idJenis_transaksi = '$jnsTransaksi' 
									AND tgl_transaksi BETWEEN '$FromDate' AND '$EndDate' ORDER BY tgl_transaksi ASC ");
!$result?die(mysql_error()):'';

//pengaturan nama file
$date = date('d-m-Y');
$namaFile = "ReportTypeTransaction-$date.xls";
//pengaturan judul data
$judul = "Data Laporan Berdasarkan Tipe Transaksi | Jika Tampil -PROTECTED VIEW- Lakukan Pengaturan pada POLICY SETTINGS di Aplikasi Excel Anda Untuk Dapat Mengelola Data!";
//baris berapa header tabel di tulis
$tablehead = 2;
//baris berapa data mulai di tulis
$tablebody = 3;
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
xlsWriteLabel(0,0,$judul);

$kolomhead = 0;
xlsWriteLabel($tablehead,$kolomhead++,"NO");              
xlsWriteLabel($tablehead,$kolomhead++,"NAMA SISWA");             
xlsWriteLabel($tablehead,$kolomhead++,"KELAS");
xlsWriteLabel($tablehead,$kolomhead++,"SEMESTER");
xlsWriteLabel($tablehead,$kolomhead++,"NO. TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"JENIS");
xlsWriteLabel($tablehead,$kolomhead++,"TANGGAL TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"JAM TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH TRANSAKSI");
xlsWriteLabel($tablehead,$kolomhead++,"KETERANGAN");

while ($data = mysqli_fetch_array($result))
{
$kolombody = 0;

//gunakan xlsWriteNumber untuk penulisan nomor dan xlsWriteLabel untuk penulisan string
xlsWriteNumber($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_siswa']);
xlsWriteLabel($tablebody,$kolombody++,$data['kelas']);
xlsWriteLabel($tablebody,$kolombody++,semester($data['tgl_masuk'], $data['jumlah_semester']));
xlsWriteLabel($tablebody,$kolombody++,$data['no_transaksi']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_jenis_transaksi']);
xlsWriteLabel($tablebody,$kolombody++,ubahTgl($data['tgl_transaksi']));
xlsWriteLabel($tablebody,$kolombody++,$data['jam_transaksi']);
xlsWriteNumber($tablebody,$kolombody++,$data['jumlah_bayar']);
xlsWriteLabel($tablebody,$kolombody++,$data['ket_transaksi']);

$tablebody++;
$nourut++;
}

xlsEOF();
exit();

?>