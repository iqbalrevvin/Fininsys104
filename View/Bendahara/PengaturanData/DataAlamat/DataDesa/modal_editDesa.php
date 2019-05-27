<!-- Data Modal -->
<div class="modal fade" id="editDesa<?= $desa->idDesa ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Data Desa</h4>
            </div>
            <div class="card">
                <div class="body">
                    <div class="input-group">
                        <!--NAMA DESA-->
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" maxlength="50" id="namaDesa<?= $desa->idDesa ?>" 
                                        minlength="3" value="<?= $desa->nama_desa ?>" 
                                        placeholder="Contoh: Tanggulun, Cimuncang, Dll." required>
                            </div>
                            <span class="input-group-addon">Nama Desa*</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                            </button>
                            <button type="button" value="<?= $desa->idDesa ?>" 
                                    class="btnEditDesa btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

