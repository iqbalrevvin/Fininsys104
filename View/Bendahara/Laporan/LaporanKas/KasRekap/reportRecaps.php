
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="lunas"></div>
                <h2>
                    Laporan Transaksi <b>Rekapitulasi Kas</b>
                </h2>
                <span class="font-11">Pastikan Pengaturan Kertas Sudah Di Sett Dengan Ukuran <b>A4/F4</b> Dan Dalam Mode <b>Landscape</b></span>
            </div>
            
            <div class="body">
                <div class="row clearfix">
                    <form method="post" action="">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Waktu Awal : </span>
                            <div class="form-line">
                                <input type="text" name="FromDate" class="datepicker form-control" placeholder="Tentukan Tanggal Awal..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Waktu Akhir : </span>
                            <div class="form-line">
                                <input type="text" name="EndDate" class="form-control datepicker" placeholder="Tentukan Tanggal Akhir..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <button type="submit" value="cari" name="cari" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">date_range</i>
                                <span>Submit</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
        
<?php 
if(isset($_POST['cari'])){
    $FromDate = gmdate($_POST['FromDate']);
    $EndDate = gmdate($_POST['EndDate']);
    include "showReportRecaps.php";
    } 
?>

