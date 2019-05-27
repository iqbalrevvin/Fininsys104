<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="lunas"></div>
                <h2>
                    Laporan Tunggakan Pembayaran Khusus
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Tahun Angkatan : </span>
                            <select id="pilihAngkatan" name="thnAngkatan" class="form-control show-tick" data-live-search="true" required>
                                <option value="">-- Pilih Angkatan --</option>
                                    <?php
                                    $thnQ =mysqli_query($db, "SELECT tgl_masuk FROM siswa 
                                                             GROUP BY year(tgl_masuk)");
                                    while($thn=mysqli_Fetch_array($thnQ)){
                                    $data = explode('-',$thn['tgl_masuk']);
                                    $tahun = $data[0];
                                    echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Kelas : </span>
                            <select id="pilihKelas" name="kelas" class="form-control show-tick" data-live-search="true" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php
                                    $kelasQ =mysqli_query($db, "SELECT kelas FROM siswa 
                                                             GROUP BY kelas");
                                    while($kelas=mysqli_Fetch_array($kelasQ)){
                                    
                                    echo "<option value='$kelas[kelas]'>$kelas[kelas]</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Jenis : </span>
                            <div id="loadSelect"></div>
                            <div id="pilihTunggakanKhusus">
                                <b id="ketSelect"> --Jenis Tunggakan-- </b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <button type="submit" name="reportType" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">find_in_page</i>
                                <span>Generate</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
        
<?php 
if(isset($_POST['reportType'])){
    $thnAngkatan = @mysqli_real_escape_string($db, $_POST['thnAngkatan']);
    $kelas =  @mysqli_real_escape_string($db, $_POST['kelas']);
    $jnsTunggakan = @mysqli_real_escape_string($db, $_POST['jnsTunggakan']);
    #
    include "showReportDebtSpecial.php";
    } 
?>

