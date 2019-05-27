<!-- Data Modal -->
<div class="modal fade" id="addDebitKasKhusus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></span>Transaksi Kas Masuk <?= $master->nama_master_kas ?></h4>
            </div>
            <div class="card">
                <div class="body">
                    <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
                    <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line focused success">
                            <select name="idJnsKas" data-live-search="true" required>
                                    <option value=''>-Pilih Jenis Kas-</option>
                                    <?php 
                                        include "Controller/Other/pilihJenisKas.php";
                                        while($jnsKas = $dftKasMasuk->fetch_object()):
                                            echo "<option value='$jnsKas->idJenis_kas'>
                                                $jnsKas->nama_jenis_kas
                                    </option>";
                                        endwhile;
                                    ?>
                            </select>
                        </div>
                        <span class="input-group-addon">Sumber/Tipe Kas*</span>
                    </div>

                    <!--TANGGAL TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line focused success">
                                <input type="text" name="tglKelolaKasMasuk" class="form-control datepicker" placeholder="Tanggal Transaksi..." required>
                        </div>
                        <span class="input-group-addon">Tgl Transaksi Masuk*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line focused success">
                            <input type="number" id="jmlKelolaKasMasuk" name="jmlKelolaKasMasuk" pattern="[0-9]+" class="form-control" maxlength="10" minlength="4" placeholder="Masukan Hanya Angka | Contoh: 100000"  required>
                        </div>
                        <span class="input-group-addon">Jumlah Kas Masuk*</span>
                    </div>
                    <!--/////////////-->
                    <span class="font-bold col-teal" id="convertKelolaKasMasuk">Jumlah Transaksi Masuk : Rp. .-</span>
                    <!--DESKRIPSI-->
                    <div class="input-group">
                        <div class="form-line focused success">
                            <input type="text" class="form-control" maxlength="150" name="deskripsi" 
                                        minlength="10" placeholder="Isikan Rincian Atau Deskripsi Transaksi Masuk" required>
                        </div>
                        <span class="input-group-addon">Deskripsi</span>
                    </div>
                    <!--/////////////-->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                        <i class="material-icons">clear</i>
                        <span>Tutup</span>
                    </button>
                    <button type="submit" name="btnTransaksiMasuk" class="btn bg-teal waves-effect">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
