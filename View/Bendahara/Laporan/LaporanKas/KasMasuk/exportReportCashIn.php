<?php 
//memanggil fungsi
include '../../../../../Config/Functions.php';
include '../../../../../Config/ConfigDB.php';
$FromDate 	= $_GET['FD'];
$EndDate 	= $_GET['ED'];
$Jenis 	= $_GET['JNS'];
//koneksi ke database dan jalankan query

if(@$_GET['JNS'] == 'semua'){
	$result = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
                                    WHERE kas.tgl_kas BETWEEN '$FromDate' AND '$EndDate' AND kas.tipe_kas = 'MASUK' 
                                    ORDER BY kas.tgl_kas ASC") or die ($db->error);
}else{
	$result = $db->query("SELECT * FROM kas JOIN jenis_kas ON kas.idJenis_kas = jenis_kas.idJenis_kas
                                    WHERE kas.tgl_kas BETWEEN '$FromDate' AND '$EndDate' AND kas.tipe_kas = 'MASUK' AND kas.idJenis_kas = '$Jenis'
                                    ORDER BY kas.tgl_kas ASC") or die ($db->error);
}

//pengaturan nama file
$date = date('d-m-Y');
$namaFile = "ReportCashIn-$date.xls";
//pengaturan judul data
$judul = "Data Laporan Kas Masuk";
$judul2 = "123!";
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
xlsWriteLabel($tablehead,$kolomhead++,"KODE KAS");             
xlsWriteLabel($tablehead,$kolomhead++,"JENIS KAS");
xlsWriteLabel($tablehead,$kolomhead++,"DESKRIPSI");
xlsWriteLabel($tablehead,$kolomhead++,"PETUGAS");
xlsWriteLabel($tablehead,$kolomhead++,"TANGGAL");
xlsWriteLabel($tablehead,$kolomhead++,"DEBIT");

while ($data = mysqli_fetch_array($result))
{
$kolombody = 0;

//gunakan xlsWriteNumber untuk penulisan nomor dan xlsWriteLabel untuk penulisan string
xlsWriteNumber($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data['no_kas']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_jenis_kas']);
xlsWriteLabel($tablebody,$kolombody++,$data['deskripsi']);
xlsWriteLabel($tablebody,$kolombody++,$data['petugas']);
xlsWriteLabel($tablebody,$kolombody++,ubahTgl($data['tgl_kas']));
xlsWriteNumber($tablebody,$kolombody++,$data['jml_kas_masuk']);

$tablebody++;
$nourut++;
}

xlsEOF();
exit();

?>