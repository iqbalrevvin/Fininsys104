<?php
require_once('Config/ConfigDBObject.php');

class CetakTunggakan extends Database{
    //DATA TABEL REKAP TUNGGAKAN REGULER
	public function dataRekapReguler($pindahan, $pindahSemester, $jumlahSemester, $idProdi, $angkatan, $tipe){
		if($pindahan == 'YA' ){
			$sql = "SELECT * FROM jenis_transaksi JOIN master_transaksi 
                    ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                    WHERE set_semester BETWEEN '$pindahSemester'
                    AND '$jumlahSemester' AND idJurusan = '$idProdi'
                    AND tahun_angkatan = '$angkatan' AND tipe_jenis_transaksi = '$tipe'
                    ORDER BY set_semester"; 
		}else{
			$sql = "SELECT * FROM jenis_transaksi JOIN master_transaksi 
                	ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                	WHERE set_semester BETWEEN '1' AND '$jumlahSemester' AND idJurusan = '$idProdi'
                	AND tahun_angkatan = '$angkatan' AND tipe_jenis_transaksi = '$tipe'
                	ORDER BY set_semester";
        }
		$dataRekapReguler = mysqli_query($this->koneksi, $sql);
		return $dataRekapReguler;
	}

    //DATA KEWAJIBAN MASUK DI TABEL REKAP TUNGGAKAN
	public function kewajibanMasuk($idnt, $idJenisTransaksi){
		$sql = "SELECT SUM(jumlah_bayar) AS jumlah FROM transaksi WHERE no_idnt = '$idnt'
                AND idJenis_transaksi = '$idJenisTransaksi'";
        $kewajibanMasuk = mysqli_query($this->koneksi, $sql);
        return $kewajibanMasuk;
	}

    // DATA SEMUA TRANSAKSI YANG SUDAH MASUK
    public function semuaTransaksiMasuk($idProdi, $angkatan, $tipe, $idnt){
        //IDENTIFIKASI ANGKATAN SISWA DAN PROGRAM STUDI SISWA
        $sqlJenis = "SELECT * FROM transaksi JOIN jenis_transaksi 
                    ON transaksi.idJenis_transaksi = jenis_transaksi.idJenis_transaksi
                    JOIN master_transaksi 
                    ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                    WHERE idJurusan = '$idProdi'
                    AND tahun_angkatan = '$angkatan'
                    AND tipe_jenis_transaksi = '$tipe'
                    ORDER BY transaksi.idJenis_transaksi DESC";
        $jenisQuery = mysqli_query($this->koneksi, $sqlJenis);
        $jenis = mysqli_fetch_array($jenisQuery);
        //IDENTIFIKASI JUMLAH UANG MASUK BERDASARKAN IDENTIFIKASI SISWA
        $sqlTotal = "SELECT SUM(jumlah_bayar) AS jumlah 
                        FROM transaksi WHERE no_idnt = '$idnt' 
                        AND idJenis_transaksi BETWEEN '1' 
                        AND '$jenis[idJenis_transaksi]'";
        $total = mysqli_query($this->koneksi, $sqlTotal);
        $jumlah = mysqli_fetch_array($total);
        $jumlahSemuaMasuk = $jumlah['jumlah'];

        return $jumlahSemuaMasuk;
    }

    //DATA JUMLAH KEWAJIBAN YANG HARUS DIPENUHI
    public function KewajibanHarusBayar($pindahan, $pindahSemester, $jumlahSemester, $idProdi, $angkatan, $tipe){
        if($pindahan == 'YA' ){
            $sqlKewajiban = "SELECT SUM(kewajiban) AS jmlKwjbn FROM jenis_transaksi JOIN master_transaksi 
                             ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                             WHERE set_semester BETWEEN '$pindahSemester'
                             AND '$jumlahSemester' 
                             AND master_transaksi.idJurusan = '$idProdi'
                             AND tahun_angkatan = '$angkatan'
                             AND tipe_jenis_transaksi = '$tipe'";
        }else{
            $sqlKewajiban = "SELECT SUM(kewajiban) AS jmlKwjbn FROM jenis_transaksi JOIN master_transaksi 
                             ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                             WHERE set_semester BETWEEN '1'
                             AND '$jumlahSemester' 
                             AND master_transaksi.idJurusan = '$idProdi'
                             AND tahun_angkatan = '$angkatan'
                             AND tipe_jenis_transaksi = '$tipe'";
        }
        $jmlKewajibanQuery = mysqli_query($this->koneksi, $sqlKewajiban);
        $jmlKewajiban = mysqli_fetch_array($jmlKewajibanQuery);
        $jumlah = $jmlKewajiban['jmlKwjbn'];

        return $jumlah;
    }

    //DATA SEMUA TUNGGAKAN REGULER
    public function tunggakanReguler($jumlah, $jmlKewajiban){
        $tunggakanReguler =  $jumlah - $jmlKewajiban;
        return $tunggakanReguler;
    }
	
}

$rekapTunggakan = new CetakTunggakan();

?>