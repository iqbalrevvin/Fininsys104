<!--<small>Aplikasi berada di versi terbaru <b>1.0.7</b> - <a href="?p=Changelogs">Lihat</a> apa yang baru!</small>-->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><div id="keterangan"></div>
                <h2>
                    INPUT PEMBAYARAN BARU<span id="loading2"></span>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <select name="txt_PlhSiswa" id="txt_PlhSiswa" class="form-control show-tick" data-live-search="true" required>
                                <option value="">--Pilih Siswa--</option>
                                    <?php 
                                        include "Controller/Other/PilihSiswa.php";
                                        while($dafsis = $daftar_siswa_qr->fetch_object()){
                                            echo "  <option value='$dafsis->no_idnt' data-subtext='$dafsis->kelas'>
                                                $dafsis->nama_siswa | $dafsis->nipd | $dafsis->kelas
                                    </option>";
                                            /*echo "  <option value='$dafsis[no_idnt]'>
                                                $dafsis[nama_siswa] | $dafsis[nipd] | $dafsis[no_idnt]
                                    </option> ";*/
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">format_list_bulleted</i>
                            </span>
                            <select name="txt_PlhJnsTrans" id="txt_PlhJnsTrans" class="form-control show-tick" data-live-search="true" required>
                                <option value="">--Pilih Jenis Transaksi--</option>
                                    <?php 
                                    include "Controller/Other/PilihJenisTransaksi.php";
                                    #while($JnsTrans = mysqli_fetch_array($jenis_transaksi_qr)){
                                    while($JnsTrans = $jenis_transaksi_qr->fetch_object()){    
                                        echo "<option value='$JnsTrans->idJenis_transaksi' 
                                                data-subtext='$JnsTrans->nama_jurusan | $JnsTrans->tipe_jenis_transaksi'>
                                                    $JnsTrans->nama_jenis_transaksi | $JnsTrans->tahun_angkatan
                                                </option>"; 
                                        }      
                                    ?>
                            </select>
                        </div>
                    </div>
                        
                    <form id="addTrans" onsubmit="return checkchars(this)">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <div class="form-line">
                                <input type="number" maxlength="7" minlength="3" required onkeypress="return inputAngka(event)" pattern="[0-9]+" id="txt_JmlByr" class="form-control" placeholder="Masukan Hanya Angka, Tanpa Titik(.)">
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon">Ket.</span>
                            <div class="form-line">
                                <input type="text" maxlength="50" minlength="0" id="txt_keterangan" class="form-control" placeholder="Masukan Keterangan Transaksi" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <button type="button" id="addTransaksi" onkeypress="return enterTolak(event)" class="btn bg-blue-grey waves-effect">
                            <i class="material-icons">input</i>
                            <span id="hasil-matauang">Entry</span>
                            </button>
                        </div>
                        </div>
                    <div id="show"></div>
                </div>
            </div>
        </div>
    </div>
</div>


