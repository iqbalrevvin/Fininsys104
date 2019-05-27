<!-- Data Modal -->
<div class="modal fade " id="editKasMasuk<?= $kas->idKas ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Perbarui Jenis Transaksi</h4>
            </div>
            <div class="card">
                <div class="body">
                    <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" id="idJnsKas<?= $kas->idKas ?>" data-live-search="true" required>
                                    <option value='<?= $kas->idJenis_kas ?>'><?= $kas->nama_jenis_kas ?></option>
                                    <?php 
                                        include "../../../../Controller/Other/pilihJenisKas.php";
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
                        <div class="form-line">
                                <input type="date" id="tglKasMasuk<?= $kas->idKas ?>" class="form-control datepicker" 
                                       placeholder="Tentukan Tanggal Akhir..." value="<?= $kas->tgl_kas ?>">
                        </div>
                        <span class="input-group-addon">Tgl Kas Masuk*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" onkeypress="return inputAngka(event)" pattern="[0-9]+" class="form-control" maxlength="10" id="jmlKasMasuk<?= $kas->idKas ?>" placeholder="Masukan Hanya Angka | Contoh: 100000" 
                            minlength="4" value="<?= $kas->jml_kas_masuk ?>" required>
                        </div>
                        <span class="input-group-addon">Jumlah Kas Masuk*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="150" id="deskripsi<?= $kas->idKas ?>" 
                                        minlength="10" placeholder="Isikan Rincian Atau Deskripsi Kas Masuk" 
                                        value="<?= $kas->deskripsi ?>" required>
                        </div>
                        <span class="input-group-addon">Deskripsi</span>
                    </div>
                    <!--/////////////-->
                    <!--<span class="font-bold col-teal" id="convertKas">
                        Jumlah Kas Masuk : Rp. <?= $kas->jml_kas_masuk ?> .-
                    </span>-->
                        <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" value="<?= $kas->idKas ?>" 
                                    class="btnEditKasMsk btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

