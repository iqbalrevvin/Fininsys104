<?php
require('../../../../../Config/Functions.php');
require('../../../../../Config/configdb.php');
require('../../../../../Controller/Bendahara/Laporan/LaporanPembayaran/ReportDebtSpecial/tabelTunggakanKhusus.php');
#require('../../../../../PublicFunctions/functionExcel.php');


$thnAngkatan 		=$_GET['TA'];
$kelas 				=$_GET['Kls'];
$jnsTunggakan       =$_GET['JT'];

//Send Header
$date 		= date('dmYhHis');
$namaFile 	= "Fininsys_Jenis_Tunggakan_khusus-$date.xls";
$headerJudul = "Data Laporan Tunggakan Khusus Siswa";
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
xlsWriteLabel($tablehead,$kolomhead++,"KELAS");
xlsWriteLabel($tablehead,$kolomhead++,"SEMESTER");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH PEMBAYARAN");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH KEWAJIBAN");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH TUNGGAKAN");

$datatunggakanKhusus = tabelTunggakanKhusus($thnAngkatan, $kelas);
while($data = $datatunggakanKhusus->fetch_object()):
$semester = semester($data->tgl_masuk, $data->jumlah_semester);
$idnt = $data->no_idnt;

$kolombody = 0;

xlsWriteNumber($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data->nama_siswa);
xlsWriteLabel($tablebody,$kolombody++,$data->kelas);
xlsWriteLabel($tablebody,$kolombody++,$semester);
xlsWriteNumber($tablebody,$kolombody++,jumlahPembayaran($idnt, $jnsTunggakan));
xlsWriteNumber($tablebody,$kolombody++,jumlahKewajiban($idnt, $jnsTunggakan));

	$jmlPembayaran = jumlahPembayaran($idnt, $jnsTunggakan);
	$jmlKewajiban = jumlahKewajiban($idnt, $jnsTunggakan);
xlsWriteLabel($tablebody,$kolombody++,$jmlKewajiban-$jmlPembayaran);
$tablebody++;
$nourut++;
endwhile;


xlsEOF();
exit();
?>