<!-- Data Modal -->
<div class="modal fade" id="editKota<?= $kota->idKota ?>" tabindex="-1" role="dialog">
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
                                <input type="text" class="form-control" maxlength="50" id="namaKota<?= $kota->idKota ?>" 
                                        minlength="3" value="<?= $kota->nama_kota ?>" 
                                        placeholder="Contoh: Kadungora, Leles, Dll." required>
                            </div>
                            <span class="input-group-addon">Nama Kota*</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-grey waves-effect" data-dismiss="modal">
                                    <i class="material-icons">clear</i>
                                    <span>Tutup</span>
                            </button>
                            <button type="button" value="<?= $kota->idKota ?>" 
                                    class="btnEditKota btn bg-blue-grey waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

