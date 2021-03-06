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
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <!--<select name="txt_PlhSiswa" id="txt_PlhSiswa" class="form-control show-tick PlhSiswa" data-live-search="true" disabled>
                                <option value="">--Klik Pilih Siswa--</option>
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
                            </select>-->
                            <input type="hidden" class="form-control" name="txt_PlhSiswa" id="txt_PlhSiswa" />
                            <input type="text" class="form-control" id="txt_namasiswa" 
                                    placeholder="Klik Pilih Siswa !" disabled />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm bg-blue-grey" data-toggle="modal" 
                            data-target="#modalPilihSiswa">
                            <i class="material-icons">format_list_bulleted</i>
                            <span>Pilih Siswa</span>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">format_list_bulleted</i>
                            </span>
                            <input type="hidden" class="form-control" name="txt_PlhJnsTrans" id="txt_PlhJnsTrans" />
                            <input type="text" class="form-control" id="txt_namajenis" 
                                    placeholder="klik Pilih Jenis Transaksi !" disabled />
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <button type="button" class="btn btn-sm bg-blue-grey" data-toggle="modal" 
                            data-target="#modalPilih">
                            <i class="material-icons">format_list_bulleted</i>
                            <span>Pilih Jenis Transaksi</span>
                        </button>
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
                            <button type="button" id="addTransaksi" onkeypress="return enterTolak(event)" class="btn bg-teal waves-effect">
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

<!-- Modal Pilih Jenis Transaksi -->
<div class="modal fade " id="modalPilih" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Pilih Jenis Transaksi Pembayaran</h4>
            </div>
            <div class="modal-body">
                <div id="load_jenisTransaksi">Pilih Dahulu Siswa! Jika Masih Belum Muncul, Coba Refresh Aplikasi(F5)</div>
                <div id="lookup_pilihJenisTransaksi"></div>
            </div>
        </div>
    </div>
 </div>

 <!-- Modal Pilih SISWA -->
<div class="modal fade " id="modalPilihSiswa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Pilih Siswa</h4>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                <table id="lookupPilihSiswa" class="table table-bordered table-striped table-hover display" 
                        style="width: auto; height: auto; margin-left: auto; margin-right: auto;">
                        <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">#</th>
                                <th style="text-align: left; vertical-align: middle;">Nama</th>
                                <th style="text-align: center; vertical-align: middle;">NISN</th>
                                <th style="text-align: center; vertical-align: middle;">NIPD</th>
                                <th style="text-align: center; vertical-align: middle;">Tkt</th>
                                <th style="text-align: center; vertical-align: middle;">Kelas</th>
                                <th style="text-align: left; vertical-align: middle;">Program Studi</th>
                                
                            </tr>
                        </thead>
                         <tfoot>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">#</th>
                                <th style="text-align: left; vertical-align: middle;">Nama</th>
                                <th style="text-align: center; vertical-align: middle;">NISN</th>
                                <th style="text-align: center; vertical-align: middle;">NIPD</th>
                                <th style="text-align: center; vertical-align: middle;">Tkt</th>
                                <th style="text-align: center; vertical-align: middle;">Kelas</th>
                                <th style="text-align: left; vertical-align: middle;">Program Studi</th>

                            </tr>
                        </tfoot>
                        <!--<tr class="pilihSiswa" data-idSiswa="<?= $pilih->idJenis_transaksi ?>" 
                            data-namajenis="<?= $pilih->nama_jenis_transaksi ?>">-->
                        </tr>
                    </table>
                    </div>
            </div>
        </div>
    </div>
 </div>
