<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="lunas"></div>
                <h2>
                    Laporan Transaksi Berdasarkan Jenis<span id="loading2"></span>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Jenis Transaksi : </span>
                            <select name="jnsTransaksi" class="form-control show-tick" data-live-search="true" required>
                                <option value="">-- Jenis Transaksi --</option>
                                    <?php 
                                    include "Controller/Other/PilihJenisTransaksi.php";
                                    while($JnsTrans = mysqli_fetch_array($jenis_transaksi_qr)){
                                        echo "  <option value='$JnsTrans[idJenis_transaksi]' 
                                                data-subtext='$JnsTrans[nama_jurusan] Angkatan $JnsTrans[tahun_angkatan]'>
                                                    $JnsTrans[nama_jenis_transaksi]
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
                            <button type="submit" name="reportSpecial" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">find_in_page</i>
                                <span>Generate</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
        
<?php 
if(isset($_POST['reportSpecial'])){
    $jnsTransaksi = @mysqli_real_escape_string($db, $_POST['jnsTransaksi']);
    $FromDate = gmdate($_POST['FromDate']);
    $EndDate = gmdate($_POST['EndDate']);
    include "showReportType.php";
    } 
?>

