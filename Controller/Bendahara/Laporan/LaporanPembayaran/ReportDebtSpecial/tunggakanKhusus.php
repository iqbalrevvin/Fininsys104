<?php
require_once('Config/ConfigDBObject.php');
class ReportDebtSpecial extends Database{
        public function namaTunggakan($jnsTunggakan){
                $db = $this->koneksi;
                $sql = "SELECT * FROM jenis_transaksi WHERE idJenis_transaksi = '$jnsTunggakan'";  
                $jenisTunggakanQr = $db->query($sql) or die ($db->error);
                $tunggakan = $jenisTunggakanQr->fetch_object();
                $namaTunggakan = $tunggakan->nama_jenis_transaksi;
                return $namaTunggakan;
        }
}
$tunggakanKhusus = new ReportDebtSpecial();
?>