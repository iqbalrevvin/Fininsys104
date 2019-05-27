
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Laporan Berdasarkan Kata Kunci
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="input-group">
                        <span class="input-group-addon">Kata Kunci : </span>
                            <div class="form-line">
                                <input type="text" name="kataKunci" class="form-control" placeholder="Masukan Kata Kunci" required>
                            </div>
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
                            <button type="submit" name="reportKeyword" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">find_in_page</i>
                                <span>Generate</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
        
<?php 
if(isset($_POST['reportKeyword'])){
    $keyword = @mysqli_real_escape_string($db, $_POST['kataKunci']);
    $FromDate = gmdate($_POST['FromDate']);
    $EndDate = gmdate($_POST['EndDate']);
    include "showReportKeyword.php";
    } 
?>
