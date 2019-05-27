<!-- Data Modal -->
<div class="modal fade" id="editKecamatan<?= $kec->idKecamatan ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbarui Data Kecamatan</h4>
            </div>
            <div class="card">
                <div class="body">
                    <div class="input-group">
                        <!--NAMA DESA-->
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" maxlength="50" id="namaKecamatan<?= $kec->idKecamatan ?>" 
                                        minlength="3" value="<?= $kec->nama_kecamatan ?>" 
                                        placeholder="Contoh: Kadungora, Leles, Dll." required>
                            </div>
                            <span class="input-group-addon">Nama Kecamatan*</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                            </button>
                            <button type="button" value="<?= $kec->idKecamatan ?>" 
                                    class="btnEditKecamatan btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

