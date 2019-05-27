<?php 
//memanggil fungsi
include '../../../../../Config/Functions.php';
include '../../../../../Config/configdb.php';
$thnAngkatan 		=$_GET['TA'];
$kelas 				=$_GET['Kls'];
//koneksi ke database dan jalankan query
$result = $db->query("SELECT * FROM siswa JOIN kelas ON kelas.nama_kelas = siswa.kelas
                                    JOIN prodi ON kelas.idJurusan = prodi.idJurusan 
                                    WHERE year(siswa.tgl_masuk) = '$thnAngkatan' 
                                    AND siswa.kelas = '$kelas'") or die ($db->error);
//pengaturan nama file
$date = date('d-m-Y');
$namaFile = "ReportDebt-$date.xls";
//pengaturan judul data
$judul = "Data Laporan Tunggakan Siswa | Jika Tampil -PROTECTED VIEW- Lakukan Pengaturan pada POLICY SETTINGS di Aplikasi Excel Anda Untuk Dapat Mengelola Data!";
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
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH PEMBAYARAN");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH KEWAJIBAN");
xlsWriteLabel($tablehead,$kolomhead++,"JUMLAH TUNGGAKAN");


while ($data = mysqli_fetch_array($result)){
$semester = semester($data['tgl_masuk'], $data['jumlah_semester']);
$kolombody = 0;

//gunakan xlsWriteNumber untuk penulisan nomor dan xlsWriteLabel untuk penulisan string
xlsWriteNumber($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_siswa']);
xlsWriteLabel($tablebody,$kolombody++,$data['kelas']);
xlsWriteLabel($tablebody,$kolombody++,$semester);
	//Jumlah Yang Sudah Di Bayar
	if($data['pindahan'] == 'YA'){
        $dataPembayaran=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah 
                                            FROM transaksi JOIN jenis_transaksi 
                                            ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                            WHERE set_semester between '$data[pindah_di_semester]' AND '$semester' 
                                            AND transaksi.no_idnt = '$data[no_idnt]'");
    }else{
        $dataPembayaran=mysqli_query($db, "select SUM(jumlah_bayar) AS jumlah FROM transaksi JOIN jenis_transaksi 
                                            ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi 
                                            WHERE jenis_transaksi.set_semester between '1' AND '$semester' AND 
                                            transaksi.no_idnt = '$data[no_idnt]'");
    }
        $jumlah=mysqli_fetch_array($dataPembayaran);
        $jumlahBayar = $jumlah['jumlah'];
xlsWriteNumber($tablebody,$kolombody++,$jumlahBayar);
//Kewajiban Yang Harus DI bayar
    $jurusan = $db->query("SELECT * FROM master_transaksi JOIN jenis_transaksi
                        ON master_transaksi.idMaster_transaksi = jenis_transaksi.idMaster_transaksi 
                            WHERE idJurusan = '$data[idJurusan]' 
                            AND tahun_angkatan = '$thnAngkatan'
                            AND tipe_jenis_transaksi = 'REGULER' 
                            ORDER BY master_transaksi.idMaster_transaksi DESC");
    $dataKewajiban = $jurusan->fetch_array();
        //Kewajiban Yang Harus DI bayar
    if($data['pindahan'] == 'YA'){ 
        $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn FROM jenis_transaksi
                                            JOIN master_transaksi 
                                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
                                            WHERE set_semester between '$data[pindah_di_semester]' 
                                            AND '$semester' 
                                            AND master_transaksi.idMaster_transaksi between '1' 
                                            AND '$dataKewajiban[idMaster_transaksi]'
                                            AND tahun_angkatan = '$thnAngkatan'
                                            AND idJurusan = '$data[idJurusan]'
                                            AND tipe_jenis_transaksi = 'REGULER'");
    }else{
        $jmlKwjbnQuery=mysqli_query($db, "select SUM(kewajiban) AS jmlKwjbn FROM jenis_transaksi
                                            JOIN master_transaksi 
                                            ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi 
                                            WHERE set_semester between '1' 
                                            AND '$semester' 
                                            AND master_transaksi.idMaster_transaksi between '1' 
                                            AND '$dataKewajiban[idMaster_transaksi]'
                                            AND tahun_angkatan = '$thnAngkatan'
                                            AND idJurusan = '$data[idJurusan]'
                                            AND tipe_jenis_transaksi = 'REGULER'");
    }
    $jmlKwjbn=mysqli_fetch_array($jmlKwjbnQuery);
    //Kewajiban Yang Sudah Bayar
    $jmlKewajiban = $jmlKwjbn['jmlKwjbn'];
xlsWriteNumber($tablebody,$kolombody++,$jmlKewajiban);
	$jumlahTunggakan = $jmlKewajiban - $jumlahBayar;
xlsWriteNumber($tablebody,$kolombody++,$jumlahTunggakan);
$tablebody++;
$nourut++;
}
xlsEOF();
exit();

?>