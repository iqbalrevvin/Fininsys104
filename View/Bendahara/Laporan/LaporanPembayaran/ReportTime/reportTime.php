
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="lunas"></div>
                <h2>
                    Laporan Transaksi Berdasarkan Waktu<span id="loading2"></span>
                </h2>
            </div>
            
            <div class="body">
                <div class="row clearfix">
                    <form method="post" action="">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Waktu Awal : </span>
                            <div class="form-line">
                                <input type="date" name="FromDate" class="form-control datepicker" placeholder="Tentukan Tanggal Awal..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Waktu Akhir : </span>
                            <div class="form-line">
                                <input type="date" name="EndDate" class="form-control datepicker" placeholder="Tentukan Tanggal Akhir..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <button type="submit" value="cari" name="cari" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">date_range</i>
                                <span>Generate</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
        
<?php 
if(isset($_POST['cari'])){
    $FromDate = gmdate($_POST['FromDate']);
    $EndDate = gmdate($_POST['EndDate']);
    include "showReportTime.php";
    } 
?>

