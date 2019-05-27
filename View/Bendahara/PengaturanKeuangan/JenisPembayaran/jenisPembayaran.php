<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="lunas"></div>
                <h2>
                    DATA JENIS PEMBAYARAN
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <form method="GET">
                <input type="hidden" name="p" value="SettFinancialType">
                <input type="hidden" name="k" value="ViewFinancialType">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Tahun Angkatan : </span>
                            <select id="pilihAngkatan" name="year" class="form-control show-tick" data-live-search="true" required>
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
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Program Studi : </span>
                            <select id="pilihProdi" name="program" class="form-control show-tick" data-live-search="true" required>
                                <option value="">-- Pilih Program Studi --</option>
                                <?php
                                    $sqlProdi = "SELECT * FROM prodi ORDER BY nama_jurusan";
                                    $pilihProdi = $db->query($sqlProdi) or die ($db->error);
                                    while($prodi = $pilihProdi->fetch_object()):
                                        echo "<option value='$prodi->singkatan_jurusan'>$prodi->nama_jurusan</option>";
                                    endwhile;
                                ?>
                              
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group" >
                            <button type="submit" id="btnTampilJenisTransaksi" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">find_in_page</i>
                                <span  id="loadingJenisTransaksi">Tampilkan</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                
        
<?php 
/*if(isset($_POST['reportType'])){
    $thnAngkatan = @mysqli_real_escape_string($db, $_POST['thnAngkatan']);
    $kelas =  @mysqli_real_escape_string($db, $_POST['kelas']);
    $jnsTunggakan = @mysqli_real_escape_string($db, $_POST['jnsTunggakan']);
    include "showReportDebt.php";
    } 
*/
?>

