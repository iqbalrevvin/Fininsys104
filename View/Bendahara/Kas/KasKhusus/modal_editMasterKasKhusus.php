<!-- Data Modal -->
<div class="modal fade" id="editMasterKasKhusus<?= $master->idMaster_kas ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Master Kas Khusus</h4>
            </div>
            <div class="card">
                <div class="body">
                   <!--NAMA JENIS KAS MASUK-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaMasterKasKhusus<?= $master->idMaster_kas ?>" minlength="10" 
                                   placeholder="Contoh: Ujian Nasional 2018, Prakerin 2018, Uang Pakain 2017, Dll." value="<?= $master->nama_master_kas ?>" required>
                        </div>
                        <span class="input-group-addon">Nama Master Kas Khusus*</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" value="<?= $master->idMaster_kas ?>" 
                                    class="btnEditMasterKasKhusus btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

