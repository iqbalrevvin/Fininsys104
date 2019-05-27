<?php
require_once('../../../../../Config/ConfigDBObject.php');
class SelectReportDebt extends Database{
        public function pilihTunggakan($pilihAngkatan, $pilihKelas){
                $db = $this->koneksi;
                $cekProdi = $db->query("SELECT * FROM kelas WHERE nama_kelas = '$pilihKelas'") or die ($db->error);
                $kelas = $cekProdi->fetch_object();
                $idJurusan = $kelas->idJurusan;

                $sql = "SELECT * FROM jenis_transaksi JOIN master_transaksi
                        ON jenis_transaksi.idMaster_transaksi = master_transaksi.idMaster_transaksi
                        JOIN prodi ON master_transaksi.idJurusan = prodi.idJurusan
                        WHERE master_transaksi.tahun_angkatan = '$pilihAngkatan'
                        AND master_transaksi.idJurusan = '$idJurusan'
                        AND jenis_transaksi.tipe_jenis_transaksi = 'KHUSUS'";

                $jenis_transaksi_qr = $db->query($sql) or die ($db->error);
                return $jenis_transaksi_qr;
        }
}
$selectReport = new SelectReportDebt();
?>