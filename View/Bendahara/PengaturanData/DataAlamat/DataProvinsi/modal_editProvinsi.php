<!-- Data Modal -->
<div class="modal fade" id="editProvinsi<?= $prov->idProvinsi ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Data Kota</h4>
            </div>
            <div class="card">
                <div class="body">
                    <div class="input-group">
                        <!--NAMA DESA-->
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" maxlength="50" id="namaProvinsi<?= $prov->idProvinsi ?>" 
                                        minlength="3" value="<?= $prov->nama_provinsi ?>" 
                                        placeholder="Contoh: Jawa Barat, Jawa Timur, Dll." required>
                            </div>
                            <span class="input-group-addon">Nama Provinsi*</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                            </button>
                            <button type="button" value="<?= $prov->idProvinsi ?>" 
                                    class="btnEditProvinsi btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

