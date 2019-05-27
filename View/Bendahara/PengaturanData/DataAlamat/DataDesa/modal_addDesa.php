<!-- Data Modal -->
<div class="modal fade" id="addDesa" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Desa</h4>
            </div>
            <div class="card">
                <div class="body">
                    <!--NAMA DESA-->
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" maxlength="50" id="namaDesa" minlength="3" placeholder="Contoh: Tanggulun, Cimuncang, Dll." required>
                        </div>
                        <span class="input-group-addon">Nama Desa*</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                                </button>
                            <button type="button" id="btnAddDesa" class="btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

