<!-- Data Modal -->
<div class="modal fade" id="editJnsKasKlr<?= $jenisKas->idJenis_kas ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Jenis Kas Keluar</h4>
            </div>
            <div class="card">
                <div class="body">

                    <!--NAMA PROGRAM STUDI-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaJnsKasKlr<?= $jenisKas->idJenis_kas ?>" minlength="10" 
                                    placeholder="Contoh: Praktikum, Uang Ujian Nasional, Uang Pakain, Dll." 
                                    value="<?= $jenisKas->nama_jenis_kas ?>" required>
                        </div>
                        <span class="input-group-addon">Nama Jenis Kas Keluar*</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" value="<?= $jenisKas->idJenis_kas ?>" 
                                    class="btnEditJnsKasKlr btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

