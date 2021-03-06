<!-- Data Modal -->
<div class="modal fade" id="addKasKeluar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span  id="loading2"></span>Tambah Transaksi Kas Keluar</h4>
            </div>
            <div class="card">
                <div class="body">
                     <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <select class="selectpicker" id="idJnsKas" data-live-search="true" required>
                                    <option value=''>--Jenis/Sumber Kas--</option>
                                    <?php 
                                        include "../../../../Controller/Other/pilihJenisKas.php";
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
                                <input type="date" id="tglKasKeluar" class="form-control datepicker" placeholder="Tentukan Tanggal Akhir...">
                        </div>
                        <span class="input-group-addon">Tgl Kas Keluar*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="number" pattern="[0-9]+" class="form-control" maxlength="10" minlength="4" id="jmlKasKeluar" placeholder="Masukan Hanya Angka | Contoh: 100000"  required>
                        </div>
                        <span class="input-group-addon">Jumlah Kas Keluar*</span>
                    </div>
                    <!--/////////////-->
                    <span class="font-bold col-teal" id="convertKasKlr"></span>
                    <!--DESKRIPSI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="150" id="deskripsi" 
                                        minlength="10" placeholder="Isikan Rincian Atau Deskripsi Kas Keluar" required>
                        </div>
                        <span class="input-group-addon">Deskripsi</span>
                    </div>
                    <!--/////////////-->
                    
                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                <i class="material-icons">clear</i>
                                <span>Tutup</span>
                            </button>
                            <button type="button" id="btnKasKeluar" class="btn bg-teal waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

