<!-- Data Modal -->
<div class="modal fade" id="editKelolaKasKhusus<?= $kas->idKas_khusus ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Perbarui Kelola Kas Khusus</h4>
            </div>
            <div class="card">
                <div class="body">
                <!--NAMA MASTER HIDDEN-->
                    <input type="hidden" id="namaMaster<?= $kas->idKas_khusus ?>" class="form-control" value="<?= $kas->nama_master_kas ?>">
        
                <!--/////////////-->
                <!--MASTER KAS-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="idMasterKas<?= $kas->idKas_khusus ?>" data-live-search="true" disabled>
                                    <option value='<?= $kas->idMaster_kas ?>'><?= $kas->nama_master_kas ?></option>
                            </select>
                        </div>
                        <span class="input-group-addon">Master Kas*</span>
                    </div>
                    <!--JENIS TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select id="idJnsKasKelola<?= $kas->idKas_khusus ?>" data-live-search="true" required>
                                    <option value='<?= $kas->idJenis_kas ?>'><?= $kas->nama_jenis_kas ?></option>
                                    <optgroup label="Jenis Kas Masuk">
                                    <?php 
                                        include "Controller/Other/pilihJenisKas.php";
                                        while($jnsKas = $dftKasMasuk->fetch_object()):
                                            echo "<option value='$jnsKas->idJenis_kas'>
                                                $jnsKas->nama_jenis_kas
                                    </option>";
                                        endwhile;
                                    ?>
                                    <optgroup label="Jenis Kas Kelur">
                                    <?php 
                                        include "Contoller/Other/pilihJenisKas.php";
                                        while($jnsKas = $dftKasKeluar->fetch_object()):
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
                        <div class="form-line">
                                <input type="date" id="tglKasKelola<?= $kas->idKas_khusus ?>" class="form-control datepicker" 
                                       placeholder="Tentukan Tanggal Akhir..." value="<?= $kas->tgl_kas ?>">
                        </div>
                        <span class="input-group-addon">Tgl Kas Keluar*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" onkeypress="return inputAngka(event)" pattern="[0-9]+" class="form-control" maxlength="10" id="jmlKelolaMasuk<?= $kas->idKas_khusus ?>" placeholder="Masukan Hanya Angka | Contoh: 100000"
                            minlength="4" value="<?= $kas->jml_kas_masuk ?>" required>
                        </div>
                        <span class="input-group-addon">Jumlah Kas Masuk*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" onkeypress="return inputAngka(event)" pattern="[0-9]+" class="form-control" maxlength="10" id="jmlKelolaKeluar<?= $kas->idKas_khusus ?>" placeholder="Masukan Hanya Angka | Contoh: 100000"
                            minlength="4" value="<?= $kas->jml_kas_keluar ?>" required>
                        </div>
                        <span class="input-group-addon">Jumlah Kas Keluar*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="150" id="deskripsi<?= $kas->idKas_khusus ?>" 
                                        minlength="10" placeholder="Isikan Rincian Atau Deskripsi Kas Keluar" 
                                        value="<?= $kas->deskripsi ?>" required>
                        </div>
                        <span class="input-group-addon">Deskripsi</span>
                    </div>
                    <!--/////////////-->
                    <!--<span class="font-bold col-teal" id="convertKas">
                        Jumlah Kas Masuk : Rp. <?= $kas->jml_kas_masuk ?> .-
                    </span>-->
                </form>
                <span class="input-group-addon">*Pastikan Anda Sudah Memilih Sumber Kas Dengan Benar!</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                <i class="material-icons">clear</i>
                                <span>Tutup</span>
                    </button>
                    <button type="button" value="<?= $kas->idKas_khusus ?>" 
                            class="btnUpdateKasKelola btn bg-blue-grey waves-effect">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

