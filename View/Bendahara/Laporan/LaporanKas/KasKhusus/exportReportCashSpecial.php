<?php 
//memanggil fungsi
include '../../../../../Config/Functions.php';
include '../../../../../Config/ConfigDB.php';
$FromDate 	= $_GET['FD'];
$EndDate 	= $_GET['ED'];
$masterKas 	= $_GET['Master'];
//koneksi ke database dan jalankan query
mysql_connect('localhost', 'root', '');
mysql_select_db('si-pembayaran');
$result = $db->query("SELECT * FROM kas_khusus JOIN jenis_kas ON kas_khusus.idJenis_kas = jenis_kas.idJenis_kas
    								  JOIN master_kas_khusus ON kas_khusus.idMaster_kas = master_kas_khusus.idMaster_kas
                                    WHERE kas_khusus.tgl_kas BETWEEN '$FromDate' AND '$EndDate' 
                                    AND kas_khusus.idMaster_kas = '$masterKas'
                                    ORDER BY tgl_kas, idKas_khusus, tgl_input ASC");
$result2 = $db->query("SELECT * FROM kas_khusus JOIN jenis_kas ON kas_khusus.idJenis_kas = jenis_kas.idJenis_kas
    								  JOIN master_kas_khusus ON kas_khusus.idMaster_kas = master_kas_khusus.idMaster_kas
                                    WHERE kas_khusus.tgl_kas BETWEEN '$FromDate' AND '$EndDate' 
                                    AND kas_khusus.idMaster_kas = '$masterKas'
                                    ORDER BY tgl_kas, idKas_khusus, tgl_input ASC");

$getData = mysqli_fetch_array($result2);
$namaMaster = $getData['nama_master_kas'];
$tahunMaster = $getData['tahun_master_kas'];
//pengaturan nama file
$date = date('d-m-Y');
$namaFile = "ReportCashSpecialRecaps-$date.xls";
//pengaturan judul data
$judul = "Data Laporan Rekapitulasi $namaMaster Tahun $tahunMaster Kas Berdasarkan Tanggal Transaksi";

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
xlsWriteLabel($tablehead,$kolomhead++,"KREDIT");

while ($data = mysqli_fetch_array($result))
{
$debit  = $data['jml_kas_masuk'];
$kredit = $data['jml_kas_keluar'];
#$saldoRunning  += $debit-$kredit;
#$saldoRun = $saldoRunning;
$kolombody = 0;

//gunakan xlsWriteNumber untuk penulisan nomor dan xlsWriteLabel untuk penulisan string
xlsWriteNumber($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data['no_kas']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_jenis_kas']);
xlsWriteLabel($tablebody,$kolombody++,$data['deskripsi']);
xlsWriteLabel($tablebody,$kolombody++,$data['petugas']);
xlsWriteLabel($tablebody,$kolombody++,ubahTgl($data['tgl_kas']));
xlsWriteNumber($tablebody,$kolombody++,$debit);
xlsWriteNumber($tablebody,$kolombody++,$kredit);

$tablebody++;
$nourut++;
}

xlsEOF();
exit();

?>