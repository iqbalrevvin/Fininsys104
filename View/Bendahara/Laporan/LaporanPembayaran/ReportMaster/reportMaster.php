
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Laporan Berdasarkan Master Transaksi
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Master Transaksi : </span>
                            <select name="masterTransaksi" class="form-control show-tick" data-live-search="true" required>
                                <option value="">-- Master Transaksi --</option>
                                    <?php 
                                    include "Controller/Other/pilih_master_transaksi.php";
                                    while($masterTrans = mysqli_fetch_array($master_transaksi_qr)){
                                        echo "  <option value='$masterTrans[idMaster_transaksi]' 
                                                data-subtext='$masterTrans[nama_jurusan] Angkatan $masterTrans[tahun_angkatan]'>
                                                    $masterTrans[nama_master_transaksi]
                                                </option> "; 
                                        }      
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Tgl Awal : </span>
                            <div class="form-line">
                                <input type="date" name="FromDate" class="form-control datepicker" placeholder="Tentukan Tanggal Awal..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Tgl Akhir : </span>
                            <div class="form-line">
                                <input type="date" name="EndDate" class="form-control datepicker" placeholder="Tentukan Tanggal Akhir..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <button type="submit" name="reportMaster" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">find_in_page</i>
                                <span>Generate</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
        
<?php 
if(isset($_POST['reportMaster'])){
    $masterTransaksi = @mysqli_real_escape_string($db, $_POST['masterTransaksi']);
    $FromDate = gmdate($_POST['FromDate']);
    $EndDate = gmdate($_POST['EndDate']);
    include "showReportMaster.php";
    } 
?>
