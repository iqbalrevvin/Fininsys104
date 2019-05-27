<input type="hidden" class="form-control" value="<?= $session['pass'] ?>" maxlength="50" id="passconfirm" minlength="1" required>
<div class="modal fade" id="delSiswa" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Konfirmasi Keamanan</h4>
            </div>
            <form id="formDelSiswa">
            <div class="modal-body">
                <!--PASSWORD-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" 
                                maxlength="50" id="pass1" minlength="1" required>
                        <label class="form-label">Password</label>
                    </div>
                </div>
                <!--//-->
                <!--KONFIRMASI PASSWORD-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" 
                                name="" maxlength="50" id="pass2" minlength="1" required>
                        <label class="form-label">Konfirmasi Password</label>
                    </div>
                </div>
                <span class="font-bold">Data Siswa Akan Dihapus Secara Permanen Dan Tidak Bisa Dikembalikan</span>
            <div class="modal-footer">
                <!--<input class="btn btn-info" name="transaksi" id="addTransaksi" type="submit" value="Simpan" />-->
                <button type="button" class="btn bg-blue-grey waves-effect" data-dismiss="modal">
                    <i class="material-icons">clear</i>
                    <span>Batal</span>
                </button>
                <button type="button" class="btn bg-red waves-effect" id="BtnDelSiswa">
                    <i class="material-icons">remove_circle</i>
                    <span>Lanjutkan Hapus</span>
                </button>
                <!--<button type="button" class="btn bg-blue-grey waves-effect">
                    <i class="material-icons">print</i>
                    <span>Cetak</span>
                </button>
                -->    
            </div>
            </form>

        </div>
    </div>
</div>
