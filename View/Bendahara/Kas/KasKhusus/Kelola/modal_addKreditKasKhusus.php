<!-- Data Modal -->
<div class="modal fade" id="addKreditKasKhusus" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></span>Transaksi Kas Keluar <?= $master->nama_master_kas ?></h4>
            </div>
            <div class="card">
                <div class="body">
                    <form id="form_advanced_validation" method="POST" enctype="multipart/form-data">
                    <!--SETTING MASTER TRANSAKSI-->
                    <div class="input-group">
                        <div class="form-line focused success">
                            <select name="idJnsKas" data-live-search="true" required>
                                    <option value=''>-Pilih Jenis Kas Keluar-</option>
                                    <?php 
                                        include "Controller/Other/pilihJenisKas.php";
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
                        <div class="form-line focused success">
                                <input type="text" name="tglKelolaKasKeluar" class="form-control datepicker" placeholder="Tanggal Transaksi..." required>
                        </div>
                        <span class="input-group-addon">Tgl Transaksi Keluar*</span>
                    </div>
                    <!--/////////////-->

                    <!--JUMLAH KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line focused success">
                            <input type="number" id="jmlKelolaKasKeluar" name="jmlKelolaKasKeluar" pattern="[0-9]+" class="form-control" maxlength="10" minlength="4" placeholder="Masukan Hanya Angka | Contoh: 100000"  required>
                        </div>
                        <span class="input-group-addon">Jumlah Kas Keluar*</span>
                    </div>
                    <!--/////////////-->
                    <span class="font-bold col-teal" id="convertKelolaKasKeluar">Jumlah Transaksi Keluar : Rp. .-</span>
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
                    <button type="submit" name="btnTransaksiKeluar" class="btn bg-red waves-effect">
                        <i class="material-icons">save</i>
                        <span>Simpan</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
